<?php

namespace App\Models;

use Database\Factories\WishlistFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Raid\Core\Model\Models\Model;

class Wishlist extends Model
{
    /**
     * {@inheritdoc}
     */
    protected static string $factory = WishlistFactory::class;

    /**
     * {@inheritdoc}
     */
    protected $table = 'wishlist';

    /**
     * {@inheritdoc}
     */
    protected $fillable = [
        'user_id',
        'product_id',
    ];

    /**
     * Get a product that belongs to wishlist.
     */
    public function product(): HasOne
    {
        return $this->hasOne(Product::class);
    }
}
