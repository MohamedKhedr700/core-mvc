<?php

namespace App\Actions\Core;

use App\Enums\Action as ActionEnum;
use Raid\Core\Action\Actions\Action;
use Raid\Core\Action\Actions\Contracts\ActionInterface;

abstract class UpdateProfileAction extends Action implements ActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTION = ActionEnum::UPDATE_PROFILE;

    /**
     * Handle an action.
     */
    public function handle(array $data): bool
    {
        return $this->updateAction()->handle(account(), $data);
    }

    /**
     * Get an update action.
     */
    abstract public function updateAction(): ActionInterface;
}
