<?php

namespace App\Http\Requests\Wishlist;

use App\Traits\Requests\WithWishlistRules;
use Raid\Core\Request\Requests\FormRequest;

class AttachRequest extends FormRequest
{
    use WithWishlistRules;

    /**
     * {@inheritDoc}
     */
    public function rules(): array
    {
        return $this->withCommonRules();
    }
}
