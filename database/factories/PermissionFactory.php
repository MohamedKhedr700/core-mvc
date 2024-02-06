<?php

namespace Database\Factories;

use App\Models\Permission;
use App\Utilities\RoleUtility;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class PermissionFactory extends Factory
{
    /**
     * {@inheritdoc}
     */
    protected $model = Permission::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement($this->getPermissions()),
            'guard_name' => fake()->randomElement($this->getGuards()),
        ];
    }

    /**
     * Get models with permissions.
     */
    private function getModels(): array
    {
        return ['admin', 'user'];
    }

    /**
     * Get crud actions.
     */
    private function getCrudActions(): array
    {
        return ['create', 'list', 'show', 'update', 'delete'];
    }

    /**
     * Get guards.
     */
    private function getGuards(): array
    {
        return ['admin', 'user'];
    }

    /**
     * Get model permissions.
     */
    public function getPermissions(): array
    {
        return RoleUtility::getPermissions($this->getModels(), $this->getCrudActions());
    }
}
