<?php

namespace App\Actions\Core;

use Raid\Core\Action\Actions\Contracts\Crud\DeleteActionInterface;
use Raid\Core\Action\Actions\Crud\DeleteAction as RaidDeleteAction;
use Raid\Core\Action\Exceptions\Actionable\InvalidActionableException;

class DeleteAction extends RaidDeleteAction implements DeleteActionInterface
{
    /**
     * {@inheritDoc}
     *
     * @throws InvalidActionableException
     */
    public function handle(string|object $id): bool
    {
        return $id->delete();
    }
}
