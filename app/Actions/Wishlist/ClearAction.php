<?php

namespace App\Actions\Wishlist;

use App\Enums\Action as ActionEnum;
use App\Models\Wishlist;
use Raid\Core\Action\Actions\Action;
use Raid\Core\Action\Actions\Contracts\ActionInterface;

class ClearAction extends Action implements ActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTION = ActionEnum::CLEAR;

    /**
     * {@inheritdoc}
     */
    public const ACTIONABLE = Wishlist::class;

    /**
     * Handle the action.
     */
    public function handle(): void
    {
        account()->wishlist()->detach();
    }
}
