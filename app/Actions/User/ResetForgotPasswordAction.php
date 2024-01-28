<?php

namespace App\Actions\User;

use App\Actions\Core\ResetForgotPasswordAction as CoreResetForgotPasswordAction;
use App\Models\User;
use Raid\Core\Action\Actions\Action;
use Raid\Core\Action\Actions\Contracts\ActionInterface;

class ResetForgotPasswordAction extends CoreResetForgotPasswordAction implements ActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTIONABLE = User::class;

    /**
     * Create a new action instance.
     */
    public function __construct(
        private readonly UpdateAction $updateAction,
    ) {

    }

    /**
     * {@inheritDoc}
     */
    public function broker(): string
    {
        return 'users';
    }

    /**
     * {@inheritDoc}
     */
    public function updateAction(): ActionInterface
    {
        return $this->updateAction;
    }
}
