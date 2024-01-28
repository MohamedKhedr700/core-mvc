<?php

namespace App\Actions\Admin;

use App\Actions\Core\DeleteAction as CoreDeleteAction;
use App\Models\Admin;
use Raid\Core\Action\Actions\Contracts\Crud\DeleteActionInterface;

class DeleteAction extends CoreDeleteAction implements DeleteActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTIONABLE = Admin::class;
}
