<?php

namespace App\Actions\Admin;

use App\Actions\Core\FindAction as CoreFindAction;
use App\Models\Admin;
use Raid\Core\Action\Actions\Contracts\Crud\FindActionInterface;

class FindAction extends CoreFindAction implements FindActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTIONABLE = Admin::class;
}
