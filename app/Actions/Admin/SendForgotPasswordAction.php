<?php

namespace App\Actions\Admin;

use App\Actions\Core\SendForgotPasswordAction as CoreSendForgotPasswordAction;
use App\Models\Admin;
use Raid\Core\Action\Actions\Action;
use Raid\Core\Action\Actions\Contracts\ActionInterface;

class SendForgotPasswordAction extends CoreSendForgotPasswordAction implements ActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTIONABLE = Admin::class;

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
