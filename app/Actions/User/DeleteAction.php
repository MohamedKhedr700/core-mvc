<?php

namespace App\Actions\User;

use App\Models\User;
use Raid\Core\Action\Actions\Contracts\Crud\DeleteActionInterface;
use Raid\Core\Action\Actions\Crud\DeleteAction as RaidDeleteAction;
use Raid\Core\Action\Exceptions\Actionable\InvalidActionableException;

class DeleteAction extends RaidDeleteAction implements DeleteActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTIONABLE = User::class;

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
