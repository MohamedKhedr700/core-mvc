<?php

namespace App\Traits\Utilities;

use Illuminate\Support\Arr;

trait WithRole
{
    /**
     * Get configured roles.
     */
    public static function getRoles(array $roles = []): array
    {
        return empty($roles) ? config('role.roles', []) : Arr::only(config('role.roles', []), $roles);
    }

    /**
     * Get configured role.
     */
    public static function getRole(string $role): array
    {
        return config("role.roles.$role", []);
    }
}
