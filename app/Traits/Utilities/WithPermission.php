<?php

namespace App\Traits\Utilities;

use App\Models\Permission;
use Illuminate\Support\Collection;

trait WithPermission
{
    /**
     * Filter permissions.
     */
    public static function filter(array $permissions): Collection
    {
        return Permission::filter([
            'names' => $permissions,
        ])->get();
    }

    /**
     * Get administrator permissions.
     */
    public static function administrator(): array
    {
        return [
            'models' => ['admin', 'user'],
            'actions' => ['create', 'list', 'show', 'update', 'delete'],
        ];
    }

    /**
     * Get assistant permissions.
     */
    public static function assistant(): array
    {
        return [
            'models' => ['user'],
            'actions' => ['list', 'show'],
        ];
    }
}
