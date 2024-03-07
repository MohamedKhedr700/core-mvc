<?php

namespace App\Http\Requests\Product;

use App\Traits\Requests\WithPaginationRules;
use App\Traits\Requests\WithProductRules;
use Raid\Core\Request\Requests\FormRequest;

class ListRequest extends FormRequest
{
    use WithPaginationRules;
    use WithProductRules;

    /**
     * {@inheritDoc}
     */
    public function rules(): array
    {
        return $this->withPaginationRules([
            'name' => ['nullable', 'string'],
        ]);
    }
}
