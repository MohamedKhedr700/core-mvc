<?php

namespace App\Http\Requests\User;

use App\Traits\Requests\WithPaginationRules;
use App\Traits\Requests\WithUserRules;
use Raid\Core\Request\Requests\FormRequest;

class ListRequest extends FormRequest
{
    use WithPaginationRules;
    use WithUserRules;

    /**
     * {@inheritDoc}
     */
    public function rules(): array
    {
        return $this->withPaginationRules();
    }
}
