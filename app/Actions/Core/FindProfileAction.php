<?php

namespace App\Actions\Core;

use App\Enums\Action as ActionEnum;
use Raid\Core\Action\Actions\Action;
use Raid\Core\Action\Actions\Contracts\ActionInterface;
use Raid\Core\Auth\Models\Authentication\Contracts\AccountInterface;

class FindProfileAction extends Action implements ActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTION = ActionEnum::FIND_PROFILE;

    /**
     * Handle an action.
     */
    public function handle(): AccountInterface
    {
        return account();
    }
}
