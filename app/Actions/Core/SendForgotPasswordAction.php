<?php

namespace App\Actions\Core;

use App\Enums\Action as ActionEnum;
use Illuminate\Support\Facades\Password;
use Raid\Core\Action\Actions\Action;
use Raid\Core\Action\Actions\Contracts\ActionInterface;
use Raid\Core\Action\Exceptions\Actionable\InvalidActionableException;

abstract class SendForgotPasswordAction extends Action implements ActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTION = ActionEnum::SEND_FORGOT_PASSWORD;

    /**
     * Handle the action.
     *
     * @throws InvalidActionableException
     */
    public function handle(array $data): array
    {
        $account = $this->findByAction()->handle($data, ['email']);

        return [
            'email' => $account->attribute('email'),
            'token' => Password::createToken($account),
        ];
    }

    /**
     * Get a find by action.
     */
    abstract public function findByAction(): ActionInterface;
}
