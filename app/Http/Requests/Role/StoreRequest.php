<?php

namespace App\Http\Requests\Role;

use App\Traits\Requests\WithRoleRules;
use Raid\Core\Request\Requests\FormRequest;

class StoreRequest extends FormRequest
{
    use WithRoleRules;

    /**
     * {@inheritDoc}
     */
    public function rules(): array
    {
        return $this->withCommonRules();
    }
}
