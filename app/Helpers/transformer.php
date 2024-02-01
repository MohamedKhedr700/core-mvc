<?php

use Raid\Core\Repository\Transformers\Transformer;

if (! function_exists('transform_result')) {
    /**
     * Get a transform result from data set with a transformer.
     */
    function transformer_data(mixed $data, Transformer $transformer): ?array
    {
        return fractal($data, $transformer)->toArray()['data'] ?? null;
    }
}
