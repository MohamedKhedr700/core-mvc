<?php

namespace App\Models;

use App\Models\ModelFilters\ProductFilter;
use Database\Factories\ProductFactory;
use Database\Factories\UserFactory;
use Raid\Core\Model\Models\Model;

class Product extends Model
{
    /**
     * {@inheritdoc}
     */
    protected static string $factory = ProductFactory::class;

    /**
     * {@inheritdoc}
     */
    protected string $filter = ProductFilter::class;

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
