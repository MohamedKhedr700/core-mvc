<?php

namespace App\Actions\Admin;

use App\Models\Admin;
use Illuminate\Support\Facades\Password;
use Raid\Core\Action\Actions\Action;
use Raid\Core\Action\Actions\Contracts\ActionInterface;
use Raid\Core\Action\Exceptions\Actionable\InvalidActionableException;

class VerifyForgotPasswordAction extends Action implements ActionInterface
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
     * Create a new action instance.
     */
    public function __construct(
        private readonly FindByAction $findByAction
    ) {

    }

    /**
     * Handle the action.
     *
     * @throws InvalidActionableException
     */
    public function handle(string $email): void
    {
        $admin = $this->findByAction->handle(['email' => $email], ['id', 'email']);

        Password::deleteToken($admin);
    }
}
