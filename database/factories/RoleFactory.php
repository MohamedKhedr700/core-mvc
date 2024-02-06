<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class RoleFactory extends Factory
{
    /**
     * {@inheritdoc}
     */
    protected $model = Role::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement($this->getRoles()),
            'guard_name' => fake()->randomElement($this->getGuards()),
        ];
    }

    /**
     * Get roles.
     */
    private function getRoles(): array
    {
        return ['administrator', 'assistant'];
    }

    /**
     * Get guards.
     */
    private function getGuards(): array
    {
        return ['admin', 'user'];
    }
}
