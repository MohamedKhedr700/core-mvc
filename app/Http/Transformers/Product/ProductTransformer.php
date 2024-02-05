<?php

namespace App\Http\Transformers\Product;

use App\Models\Product;
use League\Fractal\Resource\Primitive;
use Raid\Core\Repository\Transformers\Transformer;

class ProductTransformer extends Transformer
{
    /**
     * {@inheritdoc}
     */
    protected array $availableIncludes = [
        'admin', 'user',
    ];

    /**
     * Transform a given model.
     */
    public function transform(Product $product): array
    {
        return [
            'id' => $product->attribute('id', ''),
            'name' => $product->attribute('name', ''),
            'price' => $product->attribute('price', 0),
            'description' => $product->attribute('description', ''),
            'image' => $product->attribute('image', ''),
            'createdAt' => $product->getAttribute('created_at')?->toIsoString() ?? '',
            'updatedAt' => $product->getAttribute('updated_at')?->toIsoString() ?? '',
        ];
    }

    /**
     * Include admin data.
     */
    protected function includeAdmin(Product $product): Primitive
    {
        return $this->primitive([
            'totalFavourites' => $this->extendTotalFavourites($product),
        ]);
    }

    /**
     * Include user data.
     */
    protected function includeUser(Product $product): Primitive
    {
        return $this->primitive([
            'isFavourite' => $this->extendIsFavourite($product),
        ]);
    }

    /**
     * Extend total favourites.
     */
    protected function extendTotalFavourites(Product $product): int
    {
        return $product->users()->count();
    }

    /**
     * Extend is favourite flag.
     */
    protected function extendIsFavourite(Product $product): bool
    {
        return account()->wishlist()->where('product_id', $product->attribute('id'))->exists();
    }
}
