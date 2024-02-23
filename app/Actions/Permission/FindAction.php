<?php

namespace App\Actions\Permission;

use App\Actions\Core\FindAction as CoreFindAction;
use App\Models\Permission;
use Raid\Core\Action\Actions\Contracts\Crud\FindActionInterface;

class FindAction extends CoreFindAction implements FindActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTIONABLE = Permission::class;
}
