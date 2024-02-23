<?php

namespace App\Broadcasts;

use App\Http\Transformers\Product\ProductTransformer;
use App\Models\Product;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class HomeBroadcast implements ShouldBroadcastNow
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(
        private readonly Product $product,
    ) {
    }

    /**
     * Get the channels the event should broadcast on.
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('home'),
        ];
    }

    /**
     * Get the event name that should broadcast on with.
     */
    public function broadcastAs(): string
    {
        return 'product.created';
    }

    /**
     * Get the event data that should broadcast on with.
     */
    public function broadcastWith(): array
    {
        return fractal_data(
            $this->product,
            new ProductTransformer(),
        );
    }
}
