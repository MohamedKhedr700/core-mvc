<?php

namespace App\Actions\User;

use App\Actions\Core\ListAction as CoreListAction;
use App\Models\User;
use Raid\Core\Action\Actions\Contracts\Crud\ListActionInterface;

class ListAction extends CoreListAction implements ListActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTIONABLE = User::class;
}
