<?php

namespace App\Actions\User;

use App\Models\User;
use Raid\Core\Action\Actions\Contracts\Crud\UpdateActionInterface;
use Raid\Core\Action\Actions\Crud\UpdateAction as RaidUpdateAction;

class UpdateAction extends RaidUpdateAction implements UpdateActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTIONABLE = User::class;

    /**
     * {@inheritDoc}
     */
    public function handle(string|object $id, array $data): bool
    {
        return $id->update($data);
    }
}
