<?php

namespace App\Actions\Admin;

use App\Actions\Core\FindByAction as CoreFindByAction;
use App\Models\Admin;
use Raid\Core\Action\Actions\Contracts\Crud\FindByActionInterface;

class FindByAction extends CoreFindByAction implements FindByActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTIONABLE = Admin::class;
}
