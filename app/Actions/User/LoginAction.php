<?php

namespace App\Actions\User;

use App\Enums\Action as ActionEnum;
use App\Models\Admin;
use App\Models\User;
use Raid\Core\Action\Actions\Action;
use Raid\Core\Action\Actions\Contracts\ActionInterface;
use Raid\Core\Action\Exceptions\Actionable\InvalidActionableException;
use Raid\Core\Auth\Authentication\Contracts\AuthChannelInterface;

class LoginAction extends Action implements ActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTION = ActionEnum::LOGIN;

    /**
     * {@inheritdoc}
     */
    public const ACTIONABLE = User::class;

    /**
     * Handle an action.
     *
     * @throws InvalidActionableException
     */
    public function handle(array $credentials): AuthChannelInterface
    {
        return $this->actionable()->attempt($credentials);
    }
}
