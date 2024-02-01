<?php

use Raid\Core\Repository\Transformers\Transformer;

if (! function_exists('fractal_data')) {
    /**
     * Get a transformed data result from a data set with given transformer.
     */
    function fractal_data(mixed $data, Transformer $transformer): ?array
    {
        return fractal($data, $transformer)->toArray()['data'] ?? null;
    }
}
