<?php

namespace App\Actions\Wishlist;

use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Support\Collection;
use Raid\Core\Action\Actions\Action;
use Raid\Core\Action\Actions\Contracts\ActionInterface;
use Raid\Core\Action\Actions\Contracts\Crud\CreateActionInterface;
use Raid\Core\Action\Actions\Crud\CreateAction as RaidCreateAction;
use App\Enums\Action as ActionEnum;

class ListAction extends Action implements ActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTION = ActionEnum::LIST;

    /**
     * {@inheritdoc}
     */
    public const ACTIONABLE = Wishlist::class;

    /**
     * Handle the action.
     */
    public function handle(): Collection
    {
        return account()->wishlist;
    }
}
