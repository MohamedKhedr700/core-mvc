<?php

namespace App\Actions\Admin;

use App\Actions\Core\FindProfileAction as CoreFindProfileAction;
use App\Models\Admin;
use Raid\Core\Action\Actions\Contracts\ActionInterface;

class FindProfileAction extends CoreFindProfileAction implements ActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTIONABLE = Admin::class;
}
