<?php

namespace App\Models;

use Raid\Core\Model\Models\Model;

class Product extends Model
{
    /**
     * {@inheritdoc}
     */
    protected $fillable = [
        'name',
        'price',
        'description',
        'image',
    ];
}
