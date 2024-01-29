<?php

namespace App\Http\Requests\Product;

use App\Traits\Requests\WithProductRules;
use Raid\Core\Request\Requests\FormRequest;

class ListRequest extends FormRequest
{
    use WithProductRules;

    /**
     * {@inheritDoc}
     */
    public function rules(): array
    {
        return [];
    }
}
