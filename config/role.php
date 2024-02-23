<?php

use App\Enums\Role;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Roles
    |--------------------------------------------------------------------------
    |
    |
    */

    'roles' => [
        Role::MANAGEMENT => [
            'models' => [
                'admin',
                'permission',
                'product',
                'role',
                'user',
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
        Role::ADMINISTRATOR => [
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
        Role::ASSISTANT => [
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
