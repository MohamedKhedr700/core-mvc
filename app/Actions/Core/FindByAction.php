<?php

namespace App\Actions\Core;

use Raid\Core\Action\Actions\Contracts\Crud\FindByActionInterface;
use Raid\Core\Action\Actions\Crud\FindByAction as RaidFindByAction;
use Raid\Core\Action\Exceptions\Actionable\InvalidActionableException;

class FindByAction extends RaidFindByAction implements FindByActionInterface
{
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
