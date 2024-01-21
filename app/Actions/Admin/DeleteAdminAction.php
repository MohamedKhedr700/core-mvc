<?php

namespace App\Actions\Admin;

use App\Models\Admin;
use Raid\Core\Action\Actions\Contracts\Crud\CreateActionInterface;
use Raid\Core\Action\Actions\Contracts\Crud\DeleteActionInterface;
use Raid\Core\Action\Actions\Crud\CreateAction;
use Raid\Core\Action\Actions\Crud\DeleteAction;
use Raid\Core\Action\Exceptions\Actionable\InvalidActionableException;

class DeleteAdminAction extends DeleteAction implements DeleteActionInterface
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
