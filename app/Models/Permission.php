<?php

namespace App\Models;

use App\Http\Gates\Permission\PermissionGate;
use App\Models\ModelFilters\PermissionFilter;
use Database\Factories\PermissionFactory;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Collection;
use Raid\Core\Gate\Traits\Gate\Gateable;
use Raid\Core\Model\Traits\Model\Attributable;
use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    use Attributable;
    use Filterable;
    use Gateable;
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
     * {@inheritdoc}
     */
    public static function getGates(): array
    {
        return [
            PermissionGate::class,
        ];
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
