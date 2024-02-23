<?php

namespace App\Actions\Permission;

use App\Models\Permission;
use Raid\Core\Action\Actions\Contracts\Crud\CreateActionInterface;
use Raid\Core\Action\Actions\Crud\CreateAction as RaidCreateAction;

class CreateAction extends RaidCreateAction implements CreateActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTIONABLE = Permission::class;
}
