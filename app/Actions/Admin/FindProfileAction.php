<?php

namespace App\Actions\Admin;

use App\Models\Admin;
use Raid\Core\Action\Actions\Action;
use Raid\Core\Action\Actions\Contracts\ActionInterface;
use Raid\Core\Auth\Models\Authentication\Contracts\AccountInterface;

class FindProfileAction extends Action implements ActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTION = 'find_profile';

    /**
     * {@inheritdoc}
     */
    public const ACTIONABLE = Admin::class;

    /**
     * Handle an action.
     */
    public function handle(): AccountInterface
    {
        return account();
    }
}
