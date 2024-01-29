<?php

namespace App\Actions\Product;

use App\Actions\Core\UpdateAction as CoreUpdateAction;
use App\Models\Product;
use Raid\Core\Action\Actions\Contracts\Crud\UpdateActionInterface;

class UpdateAction extends CoreUpdateAction implements UpdateActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTIONABLE = Product::class;
}
