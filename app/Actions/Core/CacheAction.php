<?php

namespace App\Actions\Core;

use App\Traits\Actions\WithCache;
use Illuminate\Support\Facades\Cache;
use Raid\Core\Action\Actions\Contracts\ActionInterface;

class CacheAction
{
    use WithCache;

    /**
     * Action instance.
     */
    protected ActionInterface $action;

    /**
     * Set action instance.
     */
    public function setAction(ActionInterface $action): void
    {
        $this->action = $action;
    }

    /**
     * Get action instance.
     */
    public function action(): ActionInterface
    {
        return $this->action;
    }

    /**
     * Handle the action and cache its result.
     */
    public function remember(mixed $result, ...$arguments)
    {
        return $this->setCache($result, $arguments);
    }

    /**
     * Get a cached result for a given arguments.
     */
    public function cached(...$arguments)
    {
        return $this->getCache($arguments);
    }

    /**
     * Determine whether a cache result exists for a given arguments.
     */
    public function exists(...$arguments): bool
    {
        return $this->cacheExists($arguments);
    }
}
