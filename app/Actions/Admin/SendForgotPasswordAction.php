<?php

namespace App\Actions\Admin;

use App\Enums\Action as ActionEnum;
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
    public const ACTION = ActionEnum::SEND_FORGOT_PASSWORD;

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
        $admin = $this->findByAction->handle($data, ['email']);

        $token = Password::createToken($admin);

        return [
            'email' => $admin->attribute('email'),
            'token' => $token,
        ];
    }
}
