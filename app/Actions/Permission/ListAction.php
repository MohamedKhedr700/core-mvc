<?php

namespace App\Actions\Permission;

use App\Actions\Core\ListAction as CoreListAction;
use App\Models\Permission;
use Raid\Core\Action\Actions\Contracts\Crud\ListActionInterface;

class ListAction extends CoreListAction implements ListActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTIONABLE = Permission::class;
}
