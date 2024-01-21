<?php

namespace App\Actions\Admin;

use App\Models\Admin;
use Raid\Core\Action\Actions\Contracts\Crud\UpdateActionInterface;
use Raid\Core\Action\Actions\Crud\UpdateAction;

class UpdateAdminAction extends UpdateAction implements UpdateActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTIONABLE = Admin::class;

    /**
     * {@inheritDoc}
     */
    public function handle(string|object $id, array $data): object
    {
        return $id->update($data);
    }
}
