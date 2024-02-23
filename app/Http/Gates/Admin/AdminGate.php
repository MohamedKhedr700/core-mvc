<?php

namespace App\Http\Gates\Admin;

use App\Actions\Admin as Actions;
use App\Models\Admin;
use Raid\Core\Gate\Gates\Contracts\GateInterface;
use Raid\Core\Gate\Gates\Gate;

class AdminGate extends Gate implements GateInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTIONS = [
        'create',
        'list',
        'find',
        'update',
        'delete',
    ];

    /**
     * Determine if an account can create an admin resources.
     */
    public function create(Admin $account): bool
    {
        return $account->hasPermissionTo(Actions\ListAction::getAction());
    }

    /**
     * Determine if an account can list admin resources.
     */
    public function list(Admin $account): bool
    {
        return $account->hasPermissionTo(Actions\ListAction::getAction());
    }

    /**
     * Determine if an account can find an admin resources.
     */
    public function find(Admin $account): bool
    {
        return $account->hasPermissionTo(Actions\FindAction::getAction());
    }

    /**
     * Determine if an account can update an admin resources.
     */
    public function update(Admin $account): bool
    {
        return $account->hasPermissionTo(Actions\UpdateAction::getAction());
    }

    /**
     * Determine if an account can delete an admin resources.
     */
    public function delete(Admin $account): bool
    {
        return $account->hasPermissionTo(Actions\DeleteAction::getAction());
    }
}
