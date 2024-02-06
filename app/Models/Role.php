<?php

namespace App\Models;

use App\Models\ModelFilters\RoleFilter;
use Database\Factories\RoleFactory;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use Filterable;
    use HasFactory;

    /**
     * {@inheritDoc}
     */
    public static function factory(): RoleFactory
    {
        return RoleFactory::new();
    }

    /**
     * Provide model filter.
     */
    public function modelFilter(): string
    {
        return $this->provideFilter(RoleFilter::class);
    }
}
