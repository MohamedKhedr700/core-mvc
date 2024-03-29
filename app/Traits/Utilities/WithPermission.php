<?php

namespace App\Traits\Utilities;

trait WithPermission
{
    /**
     * Get permissions for given models and actions.
     */
    public static function getPermissions(array $models, array $actions, array $permissions = []): array
    {
        foreach ($models as $key => $value) {

            $valueIsArray = is_array($value);

            $model = $valueIsArray ? $key : $value;

            if ($valueIsArray) {
                array_push($actions, ...$value);
            }

            array_push($permissions, ...static::getModelPermissions($model, $actions));
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
