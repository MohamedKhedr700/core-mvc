<?php

namespace App\Listeners\Product;

use App\Broadcasts\HomeBroadcast;
use App\Models\Product;
use Raid\Core\Event\Events\Contracts\EventListenerInterface;

class BroadcastProductListener implements EventListenerInterface
{
    /**
     * Handle the listener.
     */
    public function handle(Product $product): void
    {
        broadcast(new HomeBroadcast($product));
    }
}
