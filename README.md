# Laravel - AdminUserChat
A Laravel chat package to facilitate chatting between users and administrators

[![Latest Stable Version](https://poser.pugx.org/norris1z/admin_user_chat/v/stable)](https://packagist.org/packages/norris1z/admin_user_chat)
[![Total Downloads](https://poser.pugx.org/norris1z/admin_user_chat/downloads)](https://packagist.org/packages/norris1z/admin_user_chat)
[![Latest Unstable Version](https://poser.pugx.org/norris1z/admin_user_chat/v/unstable)](https://packagist.org/packages/norris1z/admin_user_chat)
[![License](https://poser.pugx.org/norris1z/admin_user_chat/license)](https://packagist.org/packages/norris1z/admin_user_chat)

## Installation

Begin by installing this package through Composer. Run this command from the Terminal:

```bash
composer require norris1z/admin_user_chat
```
## Laravel integration

To wire this up in your Laravel project you need to add the service provider.
Open `app.php`, and add a new item to the providers array.

```php
'Norris1z\AdminUserChat\AdminUserChatServiceProvider::class',
```

Run this command from terminal 

```bash
php artisan vendor:publish
```
This adds ```admin_user_chat.php``` to the ```config.php``` file.

Run this command from terminal 
```bash
php artisan migrate
```
to run package migrations.

### Usage

```php
sendMessageToUser, sendMessageToAllUsers, sendMessageToAdministrator, sendMessageToAllAdministrators
```
All accept 3 parameters ```sender,recipient,message```

```php
//User Controller 

public function message(Request $request,AdminUserChat $chat)
{
    $admin = User::where('is_admin',true)->first();
    
    //This sends a message to an administrator given the admin_id and message
    $chat->sendMessageToAdministrator(Auth::id(),$admin->id,$request->message);
    
     //This sends a message to all administrators given the admin_id and message
    $chat->sendMessageToAllAdministrators(Auth::id(),$admin->id,$request->message);
    
}

// Admin Controller

public function message(Request $request,AdminUserChat $chat)
{
    // This sends a message from the administrator to a user
    $chat->sendMessageToUser(Auth::id(),$request->user_id,$request->message);
    
    // This sends a message from the administrator to all users
    $chat->sendMessageToAllUsers(Auth::id(),$request->user_id,$request->message);
}
```

### Config parameters

```table``` which refers to the user table name

```column_name``` which refers to the column name in the database which checks if a user is an administrator

```admin_role``` which refers to the type of admin check eg. ```bool``` ```true``` / ```false``` or using numbers for roles 

```user_id``` which refers to the user id column name in the database

```database``` which refers to the name of the messages table name
