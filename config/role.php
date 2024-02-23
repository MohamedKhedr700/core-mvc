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
                'product',
            ],
            'actions' => [
                'list',
                'find',
            ],
            'permissions' => [
                'create.product',
                'update.product',
                'delete.product',
            ],
        ],
    ],

];
