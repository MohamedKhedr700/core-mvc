<?php

namespace App\Actions\Admin;

use App\Models\Admin;
use Illuminate\Support\Facades\Password;
use Raid\Core\Action\Actions\Action;
use Raid\Core\Action\Actions\Contracts\ActionInterface;
use Raid\Core\Action\Exceptions\Actionable\InvalidActionableException;

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
    public function handle(array $data): array
    {
        $admin = $this->findByAction->handle($data, ['id', 'email']);

        $token = Password::createToken($admin);

        return [
            'id' => $admin->attribute('id'),
            'email' => $admin->attribute('email'),
            'token' => $token,
        ];
    }
}
