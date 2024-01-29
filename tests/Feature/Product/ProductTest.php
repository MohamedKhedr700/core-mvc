<?php

namespace Tests\Feature\Product;

use App\Models\Product;

trait ProductTest
{
    /**
     * The test uri.
     */
    public string $uri = '/api/v1/admin/products';

    /**
     * Get test record.
     */
    public function record(array $data = []): Product
    {
        return factory(Product::class, $data);
    }

    /**
     * Get test body.
     */
    public function body(): array
    {
        return [
            'name' => fake()->name(),
            'price' => fake()->numberBetween(10, 100),
            'description' => fake()->text,
            'image' => fake()->imageUrl,
        ];
    }

    /**
     * Get test empty body.
     */
    public function emptyBody(): array
    {
        return [
            'name' => null,
            'price' => null,
            'description' => null,
            'image' => null,
        ];
    }

    /**
     * Get test resource
     */
    public function resource(): array
    {
        return [
            'id',
            'name',
            'price',
            'description',
            'image',
            'created_at',
            'updated_at',
        ];
    }
}
