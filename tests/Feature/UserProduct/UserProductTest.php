<?php

namespace Tests\Feature\UserProduct;

use App\Models\Product;

trait UserProductTest
{
    /**
     * The test uri.
     */
    public string $uri = '/api/v1/user/products';

    /**
     * Get test record.
     */
    public function record(array $data = []): Product
    {
        return factory(Product::class, $data);
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
            'createdAt',
            'updatedAt',
        ];
    }
}
