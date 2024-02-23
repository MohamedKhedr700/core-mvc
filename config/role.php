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
            'models' => [
                'admin',
                'user',
                'product',
            ],
            'actions' => [
                'create',
                'list',
                'find',
                'update',
                'delete',
            ],
            'permissions' => [],
        ],
        'assistant' => [
            'models' => [
                'user',
                'product' => [
                    'create',
                    'update',
                    'delete',
                ],
            ],
            'actions' => [
                'list',
                'find',
            ],
            'permissions' => [],
        ],
    ],

];
