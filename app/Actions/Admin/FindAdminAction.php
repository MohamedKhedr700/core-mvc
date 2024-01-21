<?php

namespace App\Actions\Admin;

use App\Models\Admin;
use Raid\Core\Action\Actions\Contracts\Crud\CreateActionInterface;
use Raid\Core\Action\Actions\Contracts\Crud\FindActionInterface;
use Raid\Core\Action\Actions\Crud\CreateAction;
use Raid\Core\Action\Actions\Crud\FindAction;

class FindAdminAction extends FindAction implements FindActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTIONABLE = Admin::class;

    /**
     * {@inheritDoc}
     */
    public function handle(string|object $id, array $columns = ['*']): ?object
    {
        return $id->only($columns);
    }
}
