<?php

namespace App\Actions\Admin;

use App\Actions\Core\SendForgotPasswordAction as CoreSendForgotPasswordAction;
use App\Enums\Action as ActionEnum;
use App\Models\Admin;
use Illuminate\Support\Facades\Password;
use Raid\Core\Action\Actions\Action;
use Raid\Core\Action\Actions\Contracts\ActionInterface;
use Raid\Core\Action\Exceptions\Actionable\InvalidActionableException;

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
