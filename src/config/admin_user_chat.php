<?php

return[
    /*
     *  This is the table where administrators accounts can be found
     */

    'table' => env('TABLE_NAME') ?: "users",

    /*
     *  This is the column which determines if a user is an administrator
     */

    'column_name' => env('ADMIN_COLUMN_NAME') ?: "is_admin"
];