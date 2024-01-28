<?php

namespace App\Actions\Admin;

use App\Actions\Core\LogoutAction as CoreLogoutAction;
use App\Enums\Action as ActionEnum;
use App\Models\Admin;
use Raid\Core\Action\Actions\Action;
use Raid\Core\Action\Actions\Contracts\ActionInterface;
use Raid\Core\Auth\Models\AccessToken\AccessToken;

class LogoutAction extends CoreLogoutAction implements ActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTIONABLE = Admin::class;
}
