<?php

namespace App\Actions\Core;

use App\Enums\Action as ActionEnum;
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
     * Handle an action.
     *
     * @throws InvalidActionableException
     */
    public function handle(array $credentials): AuthChannelInterface
    {
        return $this->actionable()->attempt($credentials);
    }
}
