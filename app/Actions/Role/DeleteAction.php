<?php

namespace App\Actions\Role;

use App\Actions\Core\DeleteAction as CoreDeleteAction;
use App\Models\Role;
use Raid\Core\Action\Actions\Contracts\Crud\DeleteActionInterface;

class DeleteAction extends CoreDeleteAction implements DeleteActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTIONABLE = Role::class;
}
