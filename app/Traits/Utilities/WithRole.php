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
     * Get administrator permissions.
     */
    public static function administrator(): array
    {
        return config('role.roles.administrator', []);
    }

    /**
     * Get assistant permissions.
     */
    public static function assistant(): array
    {
        return config('role.roles.assistant', []);
    }
}
