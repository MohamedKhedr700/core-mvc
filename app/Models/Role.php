<?php

namespace App\Models;

use App\Models\ModelFilters\RoleFilter;
use Database\Factories\RoleFactory;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Collection;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use Filterable;
    use HasFactory;
    use HasUuids;

    /**
     * {@inheritDoc}
     */
    public static function factory(): RoleFactory
    {
        return RoleFactory::new();
    }

    /**
     * Find roles by given names.
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
        return $this->provideFilter(RoleFilter::class);
    }
}
