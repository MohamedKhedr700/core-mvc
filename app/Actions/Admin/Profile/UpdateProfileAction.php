<?php

namespace App\Actions\Admin\Profile;

use App\Models\Admin;
use Raid\Core\Action\Actions\Action;
use Raid\Core\Action\Actions\Contracts\ActionInterface;

class UpdateProfileAction extends Action implements ActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTION = 'update_profile';

    /**
     * {@inheritdoc}
     */
    public const ACTIONABLE = Admin::class;

    /**
     * Handle an action.
     */
    public function handle(array $data): bool
    {
        return account()->update($data);
    }
}
