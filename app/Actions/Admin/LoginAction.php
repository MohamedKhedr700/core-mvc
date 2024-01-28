<?php

namespace App\Actions\Admin;

use App\Actions\Core\LoginAction as CoreLoginAction;
use App\Enums\Action as ActionEnum;
use App\Models\Admin;
use Raid\Core\Action\Actions\Action;
use Raid\Core\Action\Actions\Contracts\ActionInterface;
use Raid\Core\Action\Exceptions\Actionable\InvalidActionableException;
use Raid\Core\Auth\Authentication\Contracts\AuthChannelInterface;

class LoginAction extends CoreLoginAction implements ActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTIONABLE = Admin::class;
}
