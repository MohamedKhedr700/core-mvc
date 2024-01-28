<?php

namespace App\Actions\Admin;

use App\Actions\Core\UpdateProfileAction as CoreUpdateProfileAction;
use App\Actions\User\UpdateAction;
use App\Enums\Action as ActionEnum;
use App\Models\Admin;
use Raid\Core\Action\Actions\Action;
use Raid\Core\Action\Actions\Contracts\ActionInterface;

class UpdateProfileAction extends CoreUpdateProfileAction implements ActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTIONABLE = Admin::class;

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
