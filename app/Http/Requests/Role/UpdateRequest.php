<?php

namespace App\Http\Requests\Role;

use App\Traits\Requests\WithRoleRules;
use Raid\Core\Request\Requests\FormRequest;

class UpdateRequest extends FormRequest
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
