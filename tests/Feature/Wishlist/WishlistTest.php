<?php

namespace Tests\Feature\Wishlist;

use App\Actions\Wishlist\CreateAction;
use App\Models\Product;
use App\Models\Wishlist;

trait WishlistTest
{
    /**
     * The test uri.
     */
    public string $uri = '/api/v1/user/wishlist';

    /**
     * Get test record.
     */
    public function record(array $data = [])
    {
        return factory(Wishlist::class, $data);
    }

    /**
     * Get test body.
     */
    public function body(): array
    {
        return [
            'productId' => factory(Product::class)->getId(),
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

    /**
     * Create test wishlist.
     */
    public function createWishlist()
    {
        return CreateAction::exec($this->body());
    }
}
