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
