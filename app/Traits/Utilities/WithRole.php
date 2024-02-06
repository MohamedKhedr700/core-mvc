<?php

namespace App\Traits\Utilities;

trait WithRole
{
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
