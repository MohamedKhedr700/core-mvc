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
     * Get model permissions.
     */
    public function getPermissions(): array
    {
        return RoleUtility::getPermissions($this->getModels(), $this->getCrudActions());
    }
}
