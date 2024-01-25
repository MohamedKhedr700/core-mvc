<?php

namespace App\Actions\Admin;

use App\Enums\Action as ActionEnum;
use App\Models\Admin;
use Exception;
use Illuminate\Support\Arr;
use Raid\Core\Action\Actions\Action;
use Raid\Core\Action\Actions\Contracts\ActionInterface;
use Raid\Core\Auth\Authentication\Contracts\AuthChannelInterface;

class RegisterAction extends Action implements ActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTION = ActionEnum::REGISTER;

    /**
     * {@inheritdoc}
     */
    public const ACTIONABLE = Admin::class;

    /**
     * Create a new action instance.
     */
    public function __construct(
        private readonly CreateAction $createAction,
        private readonly LoginAction $loginAction,
    ) {

    }

    /**
     * Handle an action.
     *
     * @throws Exception
     */
    public function handle(array $data): AuthChannelInterface
    {
        $this->createAction->handle($data);

        return $this->loginAction->handle(Arr::only($data, ['email', 'password']));
    }
}
