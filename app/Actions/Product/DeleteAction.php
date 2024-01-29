<?php

namespace App\Actions\Product;

use App\Actions\Core\DeleteAction as CoreDeleteAction;
use App\Models\Product;
use Raid\Core\Action\Actions\Contracts\Crud\DeleteActionInterface;

class DeleteAction extends CoreDeleteAction implements DeleteActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTIONABLE = Product::class;
}
