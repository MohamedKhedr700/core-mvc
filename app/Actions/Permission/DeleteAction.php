<?php

namespace App\Actions\Permission;

use App\Actions\Core\DeleteAction as CoreDeleteAction;
use App\Models\Permission;
use Raid\Core\Action\Actions\Contracts\Crud\DeleteActionInterface;

class DeleteAction extends CoreDeleteAction implements DeleteActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTIONABLE = Permission::class;
}
