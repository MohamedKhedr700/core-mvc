<?php

namespace App\Actions\Wishlist;

use App\Enums\Action as ActionEnum;
use App\Models\Wishlist;
use Raid\Core\Action\Actions\Action;
use Raid\Core\Action\Actions\Contracts\ActionInterface;

class DetachAction extends Action implements ActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTION = ActionEnum::DETACH;

    /**
     * {@inheritdoc}
     */
    public const ACTIONABLE = Wishlist::class;

    /**
     * Handle the action.
     */
    public function handle(array $data): void
    {
        account()->wishlist()->detach($data['productId']);
    }
}
