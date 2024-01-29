<?php

namespace App\Traits\Requests;

trait WithProductRules
{
    /**
     * Define common rules.
     */
    public function commonRules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'price' => ['required', 'numeric', 'gt:0'],
            'description' => ['required', 'string', 'max:65535'],
            'image' => ['required', 'string'],
        ];
    }

    /**
     * Define common attributes.
     */
    public function attributes(): array
    {
        return [
            'name' => __('name'),
        ];
    }
}
