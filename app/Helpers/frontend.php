<?php

if (! function_exists('front_url')) {
    /**
     * Get a frontend url.
     */
    function front_url(string $url, ?string $concat = null): string
    {
        $fronturl = trim(config('frontend.url', ''), '/').'/'.trim(config("frontend.$url"), '/');

        return $concat ? $fronturl.'/'.ltrim($concat, '/') : $fronturl;
    }
}
