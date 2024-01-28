<?php

namespace App\Actions\Admin;

use App\Actions\Core\FindProfileAction as CoreFindProfileAction;
use App\Enums\Action as ActionEnum;
use App\Models\Admin;
use Raid\Core\Action\Actions\Action;
use Raid\Core\Action\Actions\Contracts\ActionInterface;
use Raid\Core\Auth\Models\Authentication\Contracts\AccountInterface;

class FindProfileAction extends CoreFindProfileAction implements ActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTIONABLE = Admin::class;
}
