<?php

namespace App\Http\Requests\Role;

use App\Traits\Requests\WithPaginationRules;
use App\Traits\Requests\WithRoleRules;
use Raid\Core\Request\Requests\FormRequest;

class ListRequest extends FormRequest
{
    use WithPaginationRules;
    use WithRoleRules;

    /**
     * {@inheritDoc}
     */
    public function rules(): array
    {
        return $this->withPaginationRules();
    }
}
