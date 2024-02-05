<?php

namespace App\Http\Requests\Wishlist;

use App\Traits\Requests\WithWishlistRules;
use Illuminate\Validation\Rule;
use Raid\Core\Request\Requests\FormRequest;

class DetachRequest extends FormRequest
{
    use WithWishlistRules;

    /**
     * {@inheritDoc}
     */
    public function rules(): array
    {
        return $this->withCommonRules([
            'productId' => [
                Rule::exists('wishlist', 'product_id')
                    ->where('user_id', account()->accountId())
            ],
        ]);
    }
}
