<?php

namespace App\Models;

use App\Models\ModelFilters\ProductFilter;
use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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

    /**
     * Get the users that belong to a product.
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, Wishlist::class);
    }
}
