<?php

namespace App\Actions\Product;

use App\Actions\Core\FindAction as CoreFindAction;
use App\Models\Product;
use Raid\Core\Action\Actions\Contracts\Crud\FindActionInterface;

class FindAction extends CoreFindAction implements FindActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTIONABLE = Product::class;
}
