<?php

namespace App\Actions\User;

use App\Actions\Core\FindProfileAction as CoreFindProfileAction;
use App\Models\User;
use Raid\Core\Action\Actions\Contracts\ActionInterface;

class FindProfileAction extends CoreFindProfileAction implements ActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTIONABLE = User::class;
}
