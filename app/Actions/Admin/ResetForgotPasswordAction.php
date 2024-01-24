<?php

namespace App\Actions\Admin;

use App\Enums\Action as ActionEnum;
use App\Models\Admin;
use Illuminate\Support\Facades\Password;
use Raid\Core\Action\Actions\Action;
use Raid\Core\Action\Actions\Contracts\ActionInterface;

class ResetForgotPasswordAction extends Action implements ActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTION = ActionEnum::RESET_FORGOT_PASSWORD;

    /**
     * {@inheritdoc}
     */
    public const ACTIONABLE = Admin::class;

    public function __construct(
        private readonly UpdateAction $updateAction,
    ) {

    }

    /**
     * Handle the action.
     */
    public function handle(array $data): bool
    {
        $status = Password::broker('admins')->reset($data, function (Admin $admin, string $password) {
            $this->updateAction->handle($admin, ['password' => $password]);
        });

        return $status === Password::PASSWORD_RESET;
    }
}
