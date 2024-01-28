<?php

namespace App\Actions\User;

use App\Actions\Core\SendForgotPasswordAction as CoreSendForgotPasswordAction;
use App\Models\User;
use Raid\Core\Action\Actions\Action;
use Raid\Core\Action\Actions\Contracts\ActionInterface;

class SendForgotPasswordAction extends CoreSendForgotPasswordAction implements ActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTIONABLE = User::class;

    /**
     * Create a new action instance.
     */
    public function __construct(
        private readonly FindByAction $findByAction
    ) {

    }

    /**
     * {@inheritDoc}
     */
    public function findByAction(): ActionInterface
    {
        return $this->findByAction;
    }
}
