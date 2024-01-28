<?php

namespace App\Actions\Core;

use App\Enums\Action as ActionEnum;
use Raid\Core\Action\Actions\Action;
use Raid\Core\Action\Actions\Contracts\ActionInterface;
use Raid\Core\Auth\Models\AccessToken\AccessToken;

class LogoutAction extends Action implements ActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTION = ActionEnum::LOGOUT;

    /**
     * Handle an action.
     */
    public function handle(): bool
    {
        return AccessToken::current()->delete();
    }
}
