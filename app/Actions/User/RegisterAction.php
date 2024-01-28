<?php

namespace App\Actions\User;

use App\Actions\Core\RegisterAction as CoreRegisterAction;
use App\Models\User;
use Raid\Core\Action\Actions\Action;
use Raid\Core\Action\Actions\Contracts\ActionInterface;

class RegisterAction extends CoreRegisterAction implements ActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTIONABLE = User::class;

    /**
     * Create a new action instance.
     */
    public function __construct(
        protected readonly CreateAction $createAction,
        protected readonly LoginAction $loginAction,
    ) {

    }

    /**
     * {@inheritDoc}
     */
    public function createAction(): ActionInterface
    {
        return $this->createAction;
    }

    /**
     * {@inheritDoc}
     */
    public function loginAction(): ActionInterface
    {
        return $this->loginAction;
    }
}
