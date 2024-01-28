<?php

namespace App\Actions\User;

use App\Actions\Core\DeleteAction as CoreDeleteAction;
use App\Models\User;
use Raid\Core\Action\Actions\Contracts\Crud\DeleteActionInterface;

class DeleteAction extends CoreDeleteAction implements DeleteActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTIONABLE = User::class;
}
