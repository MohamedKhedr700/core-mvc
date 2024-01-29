<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'id' => fake()->uuid,
            'name' => fake()->name(),
            'price' => fake()->numberBetween(10, 100),
            'description' => fake()->text,
            'image' => fake()->imageUrl,
            'created_at' => fake()->date,
            'updated_at' => fake()->date,
        ];
    }
}
