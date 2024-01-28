<?php

namespace App\Actions\Admin;

use App\Actions\Core\FindByAction as CoreFindByAction;
use App\Models\Admin;
use Raid\Core\Action\Actions\Contracts\Crud\FindByActionInterface;
use Raid\Core\Action\Actions\Crud\FindByAction as RaidFindByAction;
use Raid\Core\Action\Exceptions\Actionable\InvalidActionableException;

class FindByAction extends CoreFindByAction implements FindByActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTIONABLE = Admin::class;
}
