<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminUserChatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_user_chat', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sender');
            $table->string('recipient');
            $table->string('message');
            $table->string('message_key')->unique();
            $table->boolean('deleted_by_admin')->default(false);
            $table->boolean('deleted_by_user')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('admin_user_chat');
    }
}
