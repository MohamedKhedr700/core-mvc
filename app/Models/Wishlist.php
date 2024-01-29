<?php

namespace App\Models;

use Database\Factories\WishlistFactory;
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
}
