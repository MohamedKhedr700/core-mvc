<?php

namespace App\Actions\User;

use App\Actions\Core\UpdateProfileAction as CoreUpdateProfileAction;
use App\Models\User;
use Raid\Core\Action\Actions\Action;
use Raid\Core\Action\Actions\Contracts\ActionInterface;

class UpdateProfileAction extends CoreUpdateProfileAction implements ActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTIONABLE = User::class;

    /**
     * Create a new action instance.
     */
    public function __construct(
        private readonly UpdateAction $updateAction
    ) {

    }

    /**
     * {@inheritDoc}
     */
    public function updateAction(): UpdateAction
    {
        return $this->updateAction;
    }
}
