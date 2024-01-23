<?php

namespace App\Actions\Admin\ForgotPassword;

use App\Models\Admin;
use Raid\Core\Action\Actions\Action;
use Raid\Core\Action\Actions\Contracts\ActionInterface;

class SendForgotPasswordAction extends Action implements ActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTION = 'forgot_password';

    /**
     * {@inheritdoc}
     */
    public const ACTIONABLE = Admin::class;

    /**
     * Handle the action.
     */
    public function handle()
    {

    }
}
