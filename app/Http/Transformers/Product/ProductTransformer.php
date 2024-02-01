<?php

namespace App\Http\Transformers\Product;

use App\Models\Product;
use Raid\Core\Repository\Transformers\Transformer;

class ProductTransformer extends Transformer
{
    /**
     * Transform a given model.
     */
    public function transform(Product $product): array
    {
        return [
            'id' => $product->attribute('id'),
            'name' => $product->attribute('name'),
            'price' => $product->attribute('price'),
            'description' => $product->attribute('description'),
            'image' => $product->attribute('image'),
            'createdAt' => $product->getAttribute('created_at')->toIsoString(),
            'updatedAt' => $product->getAttribute('updated_at')->toIsoString(),
        ];
    }
}
