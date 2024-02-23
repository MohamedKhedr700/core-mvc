<?php

namespace App\Actions\Role;

use App\Actions\Core\ListAction as CoreListAction;
use App\Models\Role;
use Raid\Core\Action\Actions\Contracts\Crud\ListActionInterface;

class ListAction extends CoreListAction implements ListActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTIONABLE = Role::class;
}
