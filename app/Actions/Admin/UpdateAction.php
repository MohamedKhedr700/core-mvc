<?php

namespace App\Actions\Admin;

use App\Actions\Core\UpdateAction as CoreUpdateAction;
use App\Models\Admin;
use Raid\Core\Action\Actions\Contracts\Crud\UpdateActionInterface;
use Raid\Core\Action\Actions\Crud\UpdateAction as RaidUpdateAction;

class UpdateAction extends CoreUpdateAction implements UpdateActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTIONABLE = Admin::class;
}
