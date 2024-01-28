<?php

namespace App\Actions\User;

use App\Models\User;
use Raid\Core\Action\Actions\Contracts\Crud\FindByActionInterface;
use Raid\Core\Action\Actions\Crud\FindByAction as RaidFindByAction;
use Raid\Core\Action\Exceptions\Actionable\InvalidActionableException;

class FindByAction extends RaidFindByAction implements FindByActionInterface
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
    public function handle(array $conditions, array $columns = ['*'], bool $trashed = false): ?object
    {
        return $this->actionable()->filter($conditions)->select($columns)->first();
    }
}
