<?php

namespace App\Http\Requests\Admin;

use App\Traits\Requests\WithAdminRules;
use App\Traits\Requests\WithPaginationRules;
use Raid\Core\Request\Requests\FormRequest;

class ListRequest extends FormRequest
{
    use WithAdminRules;
    use WithPaginationRules;

    /**
     * {@inheritDoc}
     */
    public function rules(): array
    {
        return $this->withPaginationRules();
    }
}
