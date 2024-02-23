<?php

namespace App\Actions\Role;

use App\Actions\Core\UpdateAction as CoreUpdateAction;
use App\Models\Role;
use Raid\Core\Action\Actions\Contracts\Crud\UpdateActionInterface;

class UpdateAction extends CoreUpdateAction implements UpdateActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTIONABLE = Role::class;
}
