<?php

namespace App\Http\Gates\User;

use App\Actions\User as Actions;
use App\Models\Admin;
use Raid\Core\Gate\Gates\Contracts\GateInterface;
use Raid\Core\Gate\Gates\Gate;

class UserGate extends Gate implements GateInterface
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
     * Determine if an account can create a user resources.
     */
    public function create(Admin $account): bool
    {
        return $account->hasPermissionTo(Actions\ListAction::getAction());
    }

    /**
     * Determine if an account can list user resources.
     */
    public function list(Admin $account): bool
    {
        return $account->hasPermissionTo(Actions\ListAction::getAction());
    }

    /**
     * Determine if an account can find a user resources.
     */
    public function find(Admin $account): bool
    {
        return $account->hasPermissionTo(Actions\FindAction::getAction());
    }

    /**
     * Determine if an account can update a user resources.
     */
    public function update(Admin $account): bool
    {
        return $account->hasPermissionTo(Actions\UpdateAction::getAction());
    }

    /**
     * Determine if an account can delete a user resources.
     */
    public function delete(Admin $account): bool
    {
        return $account->hasPermissionTo(Actions\DeleteAction::getAction());
    }
}
