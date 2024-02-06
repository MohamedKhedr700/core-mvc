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
            'actions' => ['create', 'list', 'show', 'update', 'delete'],
            'permissions' => [],
        ],

        'assistant' => [
            'models' => ['user'],
            'actions' => ['list', 'show'],
            'permissions' => ['admin.show'],
        ],
    ],

];
