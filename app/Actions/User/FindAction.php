<?php

namespace App\Actions\User;

use App\Models\User;
use Raid\Core\Action\Actions\Contracts\Crud\FindActionInterface;
use Raid\Core\Action\Actions\Crud\FindAction as RaidFindAction;

class FindAction extends RaidFindAction implements FindActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTIONABLE = User::class;

    /**
     * {@inheritDoc}
     */
    public function handle(string|object $id, array $columns = ['*']): ?object
    {
        return $id;
    }
}
