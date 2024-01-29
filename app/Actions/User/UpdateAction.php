<?php

namespace App\Actions\User;

use App\Actions\Core\UpdateAction as CoreUpdateAction;
use App\Models\User;
use Raid\Core\Action\Actions\Contracts\Crud\UpdateActionInterface;

class UpdateAction extends CoreUpdateAction implements UpdateActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTIONABLE = User::class;
}
