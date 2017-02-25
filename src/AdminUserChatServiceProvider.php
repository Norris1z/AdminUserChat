<?php

namespace Norris1z\AdminUserChat;

use Illuminate\Support\ServiceProvider;

class AdminUserChatServiceProvider extends ServiceProvider
{
    /**
     *  Bootstrap the application services
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([__DIR__.'/config/admin_user_chat.php' => config_path('admin_user_chat.php')]);
        $this->loadMigrationsFrom(__DIR__.'/migrations');
    }

    /**
     *  Register the application services
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Norris1z\AdminUserChat\AdminUserChat');
    }
}