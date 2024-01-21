<?php

namespace App\Models;

use Raid\Core\Model\Models\Model;

class Wishlist extends Model
{
    /**
     * {@inheritdoc}
     */
    protected $fillable = [
        'user_id',
        'product_id',
    ];
}
