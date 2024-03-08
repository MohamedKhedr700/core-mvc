<?php

namespace App\Traits\Actions;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;

trait WithCache
{
    /**
     * Set a given arguments to cache.
     */
    protected function setCache(mixed $result, ...$arguments): mixed
    {
        Cache::set($this->getCacheKey($arguments), $result);

        return $result;
    }

    /**
     * Get a cached result from a given arguments.
     */
    protected function getCache(...$arguments): mixed
    {
        return Cache::get($this->getCacheKey($arguments));
    }

    /**
     * Determine whether a cache result exists for a given arguments.
     */
    protected function cacheExists($arguments): bool
    {
        return Cache::has($this->getCacheKey($arguments));
    }

    /**
     * Get a cache key.
     */
    protected function getCacheKey($arguments): string
    {
        return $this->action()->getAction().'.'.$this->mapCacheKey($arguments);
    }

    /**
     * Map a cache key.
     */
    protected function mapCacheKey($arguments): string
    {
        $implode = function (array $arguments, string $separator = '-') {
            return implode($separator, Arr::flatten($arguments));
        };

        $prepare = function ($arguments) use ($implode) {
            return rtrim($implode($arguments), '-');
        };

        return $prepare($arguments);
    }
}
