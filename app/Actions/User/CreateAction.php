<?php

namespace App\Actions\User;

use App\Models\User;
use Raid\Core\Action\Actions\Contracts\Crud\CreateActionInterface;
use Raid\Core\Action\Actions\Crud\CreateAction as RaidCreateAction;

class CreateAction extends RaidCreateAction implements CreateActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTIONABLE = User::class;
}
