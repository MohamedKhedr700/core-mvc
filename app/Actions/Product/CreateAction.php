<?php

namespace App\Actions\Product;

use App\Models\Product;
use Raid\Core\Action\Actions\Contracts\Crud\CreateActionInterface;
use Raid\Core\Action\Actions\Crud\CreateAction as RaidCreateAction;

class CreateAction extends RaidCreateAction implements CreateActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTIONABLE = Product::class;
}
