<?php

namespace App\Actions\Admin;

use App\Models\Admin;
use Raid\Core\Action\Actions\Contracts\Crud\CreateActionInterface;
use Raid\Core\Action\Actions\Crud\CreateAction;

class CreateAdminAction extends CreateAction implements CreateActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTIONABLE = Admin::class;
}
