<?php

namespace App\Actions\Admin;

use App\Actions\Core\LogoutAction as CoreLogoutAction;
use App\Models\Admin;
use Raid\Core\Action\Actions\Contracts\ActionInterface;

class LogoutAction extends CoreLogoutAction implements ActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTIONABLE = Admin::class;
}
