<?php

namespace App\Traits\Actions;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;

trait WithCache
{
    /**
     * Determine if cache has result for given arguments.
     */
    protected function cached(...$arguments): bool
    {
        return Cache::has($this->getCacheKey($arguments));
    }

    /**
     * Cache a given result with a key.
     */
    protected function cache($result, ...$arguments): mixed
    {
        Cache::set($this->getCacheKey($arguments), $result);

        return $result;
    }

    /**
     * Get a cached result.
     */
    protected function getCached(...$arguments): Collection|LengthAwarePaginator
    {
        return Cache::get($this->getCacheKey($arguments));
    }

    /**
     * Get a cache key.
     */
    protected function getCacheKey($arguments): string
    {
        return static::getAction().'.'.$this->prepareCacheKey($arguments);
    }

    /**
     * Prepare a cache key.
     */
    protected function prepareCacheKey($arguments): string
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
