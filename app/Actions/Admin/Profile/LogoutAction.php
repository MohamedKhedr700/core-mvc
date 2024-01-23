<?php

namespace App\Actions\Admin\Profile;

use App\Models\Admin;
use Raid\Core\Action\Actions\Action;
use Raid\Core\Action\Actions\Contracts\ActionInterface;
use Raid\Core\Action\Exceptions\Actionable\InvalidActionableException;

class LogoutAction extends Action implements ActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTION = 'logout';

    /**
     * {@inheritdoc}
     */
    public const ACTIONABLE = Admin::class;

    /**
     * Handle an action.
     *
     * @throws InvalidActionableException
     */
    public function handle(): bool
    {
        return account()->currentAccessToken()->delete();
    }
}
