<?php

namespace App\Models;

use App\Models\ModelFilters\PermissionFilter;
use Database\Factories\PermissionFactory;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    use Filterable;
    use HasFactory;

    /**
     * {@inheritDoc}
     */
    public static function factory(): PermissionFactory
    {
        return PermissionFactory::new();
    }

    /**
     * Provide model filter.
     */
    public function modelFilter(): string
    {
        return $this->provideFilter(PermissionFilter::class);
    }
}
