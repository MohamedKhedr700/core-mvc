<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Roles
    |--------------------------------------------------------------------------
    |
    |
    */

    'roles' => [

        'administrator' => [
            'models' => ['admin', 'user'],
            'actions' => ['create', 'list', 'find', 'update', 'delete'],
            'permissions' => [],
        ],

        'assistant' => [
            'models' => ['user'],
            'actions' => ['list', 'find'],
            'permissions' => [],
        ],
    ],

];
