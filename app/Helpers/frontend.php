<?php

if (! function_exists('front_url')) {
    /**
     * Get a frontend url.
     */
    function front_url(string $url, ?string $concat = null): string
    {
        return get_front_url('url', $url, $concat);
    }
}

if (! function_exists('front_admin_url')) {
    /**
     * Get a frontend admin url.
     */
    function front_admin_url(string $url, ?string $concat = null): string
    {
        return get_front_url('admin_url', $url, $concat);
    }
}

if (! function_exists('get_front_url')) {
    /**
     * Get a frontend url.
     */
    function get_front_url(string $base, string $url, ?string $concat = null): string
    {
        $fronturl = trim(config("frontend.$base", ''), '/').'/'.trim(config("frontend.$url"), '/');

        return $concat ? $fronturl.'/'.ltrim($concat, '/') : $fronturl;
    }
}
