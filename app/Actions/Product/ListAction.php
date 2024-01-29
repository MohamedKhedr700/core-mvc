<?php

namespace App\Actions\Product;

use App\Actions\Core\ListAction as CoreListAction;
use App\Models\Product;
use Raid\Core\Action\Actions\Contracts\Crud\ListActionInterface;

class ListAction extends CoreListAction implements ListActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTIONABLE = Product::class;
}
