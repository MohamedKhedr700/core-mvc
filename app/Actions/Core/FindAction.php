<?php

namespace App\Actions\Core;

use Raid\Core\Action\Actions\Contracts\Crud\FindActionInterface;
use Raid\Core\Action\Actions\Crud\FindAction as RaidFindAction;

class FindAction extends RaidFindAction implements FindActionInterface
{
    /**
     * {@inheritDoc}
     */
    public function handle(string|object $id, array $columns = ['*']): ?object
    {
        return $id;
    }
}
