<?php

namespace App\Actions\Admin;

use App\Actions\Core\LoginAction as CoreLoginAction;
use App\Models\Admin;
use Raid\Core\Action\Actions\Contracts\ActionInterface;

class LoginAction extends CoreLoginAction implements ActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTIONABLE = Admin::class;
}
