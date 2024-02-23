<?php

namespace App\Actions\Role;

use App\Actions\Core\FindAction as CoreFindAction;
use App\Models\Role;
use Raid\Core\Action\Actions\Contracts\Crud\FindActionInterface;

class FindAction extends CoreFindAction implements FindActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTIONABLE = Role::class;
}
