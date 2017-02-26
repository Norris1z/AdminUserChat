<?php

namespace Norris1z\AdminUserChat;

use Illuminate\Support\Facades\DB;

class AdminUserChat
{
    /**
     *  Configuration filename found in the config folder
     * @var string
     */
    protected $configFileName = "admin_user_chat";

    /**
     * Get all administrators from the table
     * @return mixed
     */
    public function getAdministrators()
    {
        return DB::select('select * from '.config($this->configFileName.'.table').
            ' where '.config($this->configFileName.'.column_name').' = :admin',
            ['admin'=>config($this->configFileName.'.admin_role')]);
    }

    /**
     *  Send Message to all administrators
     * @param $sender_id
     * @param $message
     */
    public function sendMessageToAllAdministrators($sender_id,$message)
    {
        foreach ($this->getAdministrators() as $administrator)
        {
            $this->send($sender_id,$this->validateAdminID($administrator),$message);
        }
    }

    /**
     *  Sends a message to the administrator
     * @param $sender
     * @param $recipient
     * @param $message
     * @return mixed
     */
    public function sendMessageToAdministrator($sender,$recipient,$message)
    {
        return $this->send($sender,$recipient,$message);
    }
    /**
     * Check if the provided parameter is an object or a numeric value
     *  it returns a call to the id property on the param if it is an object
     *  and returns the parameter if its numeric
     * @param $administrator
     * @return mixed
     */
    protected function validateAdminID($administrator)
    {
        $get_id = config($this->configFileName.'.user_id');
        if(is_object($administrator))
        {
            return $administrator->$get_id;
        }else if(is_numeric($administrator)){
            return $administrator;
        }
    }

    /**
     * This inserts the message to the DB
     * @param $sender
     * @param $recipient
     * @param $message
     * @return mixed
     */
    public function send($sender,$recipient,$message)
    {
        return DB::insert('insert into '.config($this->configFileName.'.database').
            '(sender,recipient,message,message_key,deleted_by_admin,deleted_by_user) values (?, ?, ?, ?, ?, ?)',
            [$sender,$recipient,$message,md5(str_random().time()),false,false]);
    }

    /**
     *  Sends message to a single user
     * @param $sender
     * @param $recipient
     * @param $message
     * @return mixed
     */
    public function sendMessageToUser($sender,$recipient,$message)
    {
        return $this->send($sender,$recipient,$message);
    }

    /**
     *  Sends message to all users
     * @param $sender
     * @param $users
     * @param $message
     * @return $this
     */
    public function sendMessageToAllUsers($sender,$users,$message)
    {
        foreach ($users as $user)
        {
            $this->send($sender,$user,$message);
        }
        return $this;
    }
}