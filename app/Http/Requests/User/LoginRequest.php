<?php

namespace App\Http\Requests\User;

use App\Traits\Requests\WithUserRules;
use Raid\Core\Request\Requests\FormRequest;

class LoginRequest extends FormRequest
{
    use WithUserRules;

    /**
     * {@inheritDoc}
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ];
    }
}
