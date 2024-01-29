<?php

namespace App\Actions\Core;

use Raid\Core\Action\Actions\Contracts\Crud\UpdateActionInterface;
use Raid\Core\Action\Actions\Crud\UpdateAction as RaidUpdateAction;

class UpdateAction extends RaidUpdateAction implements UpdateActionInterface
{
    /**
     * {@inheritDoc}
     */
    public function handle(string|object $id, array $data): bool
    {
        return $id->update($data);
    }
}
