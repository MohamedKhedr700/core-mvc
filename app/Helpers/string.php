<?php

use Illuminate\Support\Str;

if (! function_exists('uuid_string')) {
    /**
     * Get factory instance for a given model.
     */
    function uuid_string(): string
    {
        return Str::uuid()->toString();
    }
}
