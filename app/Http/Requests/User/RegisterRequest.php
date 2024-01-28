<?php

namespace App\Http\Requests\User;

use App\Traits\Requests\WithUserRules;
use Raid\Core\Request\Requests\FormRequest;

class RegisterRequest extends FormRequest
{
    use WithUserRules;

    /**
     * {@inheritDoc}
     */
    public function rules(): array
    {
        return $this->withCommonRules();
    }
}
