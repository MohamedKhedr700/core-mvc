<?php

namespace App\Actions\Admin;

use App\Models\Admin;
use Raid\Core\Action\Actions\Contracts\Crud\DeleteActionInterface;
use Raid\Core\Action\Actions\Crud\DeleteAction as RaidDeleteAction;
use Raid\Core\Action\Exceptions\Actionable\InvalidActionableException;

class DeleteAction extends RaidDeleteAction implements DeleteActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTIONABLE = Admin::class;

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
