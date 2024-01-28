<?php

namespace App\Actions\Admin;

use App\Actions\Core\ListAction as CoreListAction;
use App\Models\Admin;
use Raid\Core\Action\Actions\Contracts\Crud\ListActionInterface;

class ListAction extends CoreListAction implements ListActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTIONABLE = Admin::class;
}
