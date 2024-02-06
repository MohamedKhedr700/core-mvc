<?php

namespace App\Http\Gates;

use App\Actions\Admin as Actions;
use Raid\Core\Auth\Models\Authentication\Contracts\AccountInterface;
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
    public function create(AccountInterface $account)
    {
        return $account->hasPermissionTo(Actions\ListAction::getAction());
    }

    /**
     * Determine if an account can list admin resources.
     */
    public function list(AccountInterface $account)
    {
        return $account->hasPermissionTo(Actions\ListAction::getAction());
    }

    /**
     * Determine if an account can find an admin resources.
     */
    public function find(AccountInterface $account)
    {
        return $account->hasPermissionTo(Actions\FindAction::getAction());
    }

    /**
     * Determine if an account can update an admin resources.
     */
    public function update(AccountInterface $account)
    {
        return $account->hasPermissionTo(Actions\UpdateAction::getAction());
    }

    /**
     * Determine if an account can delete an admin resources.
     */
    public function delete(AccountInterface $account)
    {
        return $account->hasPermissionTo(Actions\DeleteAction::getAction());
    }
}
