<?php

namespace App\Actions\User;

use App\Actions\Core\LoginAction as CoreLoginAction;
use App\Models\User;
use Raid\Core\Action\Actions\Contracts\ActionInterface;

class LoginAction extends CoreLoginAction implements ActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTIONABLE = User::class;
}
