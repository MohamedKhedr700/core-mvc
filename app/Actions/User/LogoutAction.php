<?php

namespace App\Actions\User;

use App\Actions\Core\LogoutAction as CoreLogoutAction;
use App\Models\User;
use Raid\Core\Action\Actions\Contracts\ActionInterface;

class LogoutAction extends CoreLogoutAction implements ActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTIONABLE = User::class;
}
