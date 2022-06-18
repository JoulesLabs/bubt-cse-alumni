<?php

return [
    'connection' => env('DB_CONNECTION', 'mysql'),
    'users' => [
        'model' => \App\Models\Admin::class,
        'table' => 'admins',
    ],

    'roles_table' => 'roles',
    'user_roles_table' => 'user_roles',

    'debug' => [
        'superuser_mode' => false,
    ],

    'abilities'   => [
        /*"module"  => ['create', 'update', 'delete'],*/
        'user' => ['create', 'update', 'delete'],
        'role' => ['create', 'update', 'delete'],
        'alumni' => ['create', 'update', 'delete', 'verify'],
    ],


    'policies'  => [
        /*'module' => [
            'update'    => '\App\Permit\Policies\PostPolicy@update',
        ],*/
    ],



    'roles' => [
        /*'role_name' => [
            'ability.*',
        ],*/
    ]


];
