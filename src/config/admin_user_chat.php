<?php

return[
    /*
     *  This is the table where administrators accounts can be found
     */

    'table' => env('TABLE_NAME') ?: "users",

    /*
     *  This is the column which determines if a user is an administrator
     */

    'column_name' => env('ADMIN_COLUMN_NAME') ?: "is_admin",

    /*
     *  This is the role which determines if a user is an administrator
     * default value is true
     * set to different value if a number determines user admin status
     */

    'admin_role' => env('ADMIN_ROLE') ?: true,

    /*
     *  This refers to the name of the user's id column in the database
     */

    'user_id' => env('ID_COLUMN') ?: "id",

    /*
     *  This refers to the admin_user_chat database name
     * default is admin_user_chat
     */

    'database' => env('CHAT_DB_NAME') ?: "admin_user_chat",
];