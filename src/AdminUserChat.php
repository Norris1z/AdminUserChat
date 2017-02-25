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
    public function sendMessageToAdministrators($sender_id,$message)
    {
        foreach ($this->getAdministrators() as $administrator)
        {
          //  $this->sendToAdmin()->sendToUser();
        }
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

    public function send($id,$message)
    {
        DB::insert('insert into '.config($this->configFileName.'.database').
            '(sender,recipient,message,message_key,universal_key)');
        return $this;
    }
}