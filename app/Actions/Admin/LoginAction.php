<?php

namespace App\Actions\Admin;

use App\Enums\Action as ActionEnum;
use App\Models\Admin;
use Raid\Core\Action\Actions\Action;
use Raid\Core\Action\Actions\Contracts\ActionInterface;
use Raid\Core\Action\Exceptions\Actionable\InvalidActionableException;

class LoginAction extends Action implements ActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTION = ActionEnum::LOGIN;

    /**
     * {@inheritdoc}
     */
    public const ACTIONABLE = Admin::class;

    /**
     * Handle an action.
     *
     * @throws InvalidActionableException
     */
    public function handle(array $credentials)
    {
        return $this->actionable()->attempt($credentials);
    }
}
