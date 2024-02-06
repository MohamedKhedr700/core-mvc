<?php

namespace App\Utilities;

use App\Traits\Utilities\WithPermission;

class PermissionUtility
{
    use WithPermission;

    /**
     * Get permissions for given models and actions.
     */
    public static function getPermissions(array $models, array $actions): array
    {
        $permissions = [];

        foreach ($models as $model) {
            $permissions = array_merge($permissions, static::getModelPermissions($model, $actions));
        }

        return $permissions;
    }

    /**
     * Get model permissions.
     */
    private static function getModelPermissions(string $model, array $actions): array
    {
        $permissions = [];

        foreach ($actions as $action) {
            $permissions[] = $model.'.'.$action;
        }

        return $permissions;
    }
}
