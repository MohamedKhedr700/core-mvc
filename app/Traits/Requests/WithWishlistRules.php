<?php

namespace App\Traits\Requests;

use App\Rules\PasswordRule;

trait WithWishlistRules
{
    /**
     * Define common rules.
     */
    public function commonRules(): array
    {
        return [
            'productId' => ['required', 'string', 'exists:products,id'],
        ];
    }

    /**
     * Define common attributes.
     */
    public function attributes(): array
    {
        return [
            'productId' => __('product_id'),
        ];
    }
}
