<?php

namespace Database\Factories;

use App\Utilities\RoleUtility;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class PermissionFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement($this->getPermissions()),
            'guard_name' => 'admin',
        ];
    }

    /**
     * Get models with permissions.
     */
    private function getModels(): array
    {
        return [
            'admin',
            'permission',
            'product',
            'role',
            'user',
        ];
    }

    /**
     * Get crud actions.
     */
    private function getCrudActions(): array
    {
        return [
            'create',
            'list',
            'find',
            'update',
            'delete',
        ];
    }

    /**
     * Get model permissions.
     */
    public function getPermissions(): array
    {
        return RoleUtility::getPermissions($this->getModels(), $this->getCrudActions());
    }
}
