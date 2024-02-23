<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement($this->getRoles()),
            'guard_name' => 'admin',
        ];
    }

    /**
     * Get roles.
     */
    private function getRoles(): array
    {
        return [
            'administrator',
            'assistant',
        ];
    }
}
