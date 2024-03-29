<?php

namespace App\Actions\Admin;

use App\Actions\Core\UpdateAction as CoreUpdateAction;
use App\Models\Admin;
use Raid\Core\Action\Actions\Contracts\Crud\UpdateActionInterface;

class UpdateAction extends CoreUpdateAction implements UpdateActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTIONABLE = Admin::class;
}
