<?php

namespace App\Actions\Admin;

use App\Actions\Core\RegisterAction as CoreRegisterAction;
use App\Models\Admin;
use Raid\Core\Action\Actions\Action;
use Raid\Core\Action\Actions\Contracts\ActionInterface;

class RegisterAction extends CoreRegisterAction implements ActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTIONABLE = Admin::class;

    /**
     * Create a new action instance.
     */
    public function __construct(
        private readonly CreateAction $createAction,
        private readonly LoginAction $loginAction,
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
