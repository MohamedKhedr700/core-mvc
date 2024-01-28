<?php

namespace App\Actions\User;

use App\Actions\Core\FindAction as CoreFindAction;
use App\Models\User;
use Raid\Core\Action\Actions\Contracts\Crud\FindActionInterface;

class FindAction extends CoreFindAction implements FindActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTIONABLE = User::class;
}
