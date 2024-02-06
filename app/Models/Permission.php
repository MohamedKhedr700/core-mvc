<?php

namespace App\Models;

use App\Models\ModelFilters\PermissionFilter;
use Database\Factories\PermissionFactory;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Collection;
use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    use Filterable;
    use HasFactory;
    use HasUuids;

    /**
     * {@inheritDoc}
     */
    public static function factory(): PermissionFactory
    {
        return PermissionFactory::new();
    }

    /**
     * Find permissions by given names.
     */
    public static function findByNames(array $names): Collection
    {
        return static::filter(['names' => $names])->get();
    }

    /**
     * Provide model filter.
     */
    public function modelFilter(): string
    {
        return $this->provideFilter(PermissionFilter::class);
    }
}
