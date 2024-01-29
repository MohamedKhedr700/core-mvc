<?php

namespace App\Actions\Admin;

use App\Actions\Core\ResetForgotPasswordAction as CoreResetForgotPasswordAction;
use App\Models\Admin;
use Raid\Core\Action\Actions\Action;
use Raid\Core\Action\Actions\Contracts\ActionInterface;

class ResetForgotPasswordAction extends CoreResetForgotPasswordAction implements ActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTIONABLE = Admin::class;

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
        return 'admins';
    }

    /**
     * {@inheritDoc}
     */
    public function updateAction(): ActionInterface
    {
        return $this->updateAction;
    }
}
