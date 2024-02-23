<?php

namespace App\Utilities;

class PaginateUtility
{
    /**
     * Get configured per page value.
     */
    public static function getPerPage(): int
    {
        return config('app.per_page', 15);
    }
}
