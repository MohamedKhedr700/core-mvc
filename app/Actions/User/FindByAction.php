<?php

namespace App\Actions\User;

use App\Actions\Core\FindByAction as CoreFindByAction;
use App\Models\User;
use Raid\Core\Action\Actions\Contracts\Crud\FindByActionInterface;

class FindByAction extends CoreFindByAction implements FindByActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTIONABLE = User::class;
}
