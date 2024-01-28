<?php

namespace App\Actions\Core;

use App\Enums\Action as ActionEnum;
use Exception;
use Illuminate\Support\Arr;
use Raid\Core\Action\Actions\Action;
use Raid\Core\Action\Actions\Contracts\ActionInterface;
use Raid\Core\Auth\Authentication\Contracts\AuthChannelInterface;

abstract class RegisterAction extends Action implements ActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTION = ActionEnum::REGISTER;

    /**
     * Handle an action.
     *
     * @throws Exception
     */
    public function handle(array $data): AuthChannelInterface
    {
        $this->createAction()->handle($data);

        return $this->loginAction()->handle(Arr::only($data, ['email', 'password']));
    }

    /**
     * Get a creation action.
     */
    abstract public function createAction(): ActionInterface;

    /**
     * Get a login action.
     */
    abstract public function loginAction(): ActionInterface;
}
