<?php

namespace App\Events\Product;

use App\Actions\Product\CreateAction;
use App\Listeners\Product\BroadcastProductListener;
use Raid\Core\Event\Events\Contracts\EventInterface;
use Raid\Core\Event\Events\Event;

class CreatedEvent extends Event implements EventInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTION = CreateAction::ACTION;

    /**
     * {@inheritdoc}
     */
    public const LISTENERS = [
        BroadcastProductListener::class,
    ];
}
