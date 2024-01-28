<?php

namespace App\Actions\Core;

use App\Enums\Action as ActionEnum;
use Illuminate\Support\Facades\Password;
use Raid\Core\Action\Actions\Action;
use Raid\Core\Action\Actions\Contracts\ActionInterface;
use Raid\Core\Model\Models\Model;

abstract class ResetForgotPasswordAction extends Action implements ActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTION = ActionEnum::RESET_FORGOT_PASSWORD;

    /**
     * Handle the action.
     */
    public function handle(array $data): bool
    {
        $status = Password::broker($this->broker())->reset($data, function (Model $model, string $password) {
            $this->updateAction()->handle($model, ['password' => $password]);
        });

        return $status === Password::PASSWORD_RESET;
    }

    /**
     * Get a password broker.
     */
    abstract public function broker(): string;

    /**
     * Get an update action.
     */
    abstract public function updateAction(): ActionInterface;
}
