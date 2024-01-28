<?php

namespace App\Http\Requests\User;

use App\Traits\Requests\WithUserRules;
use Raid\Core\Request\Requests\FormRequest;

class SendForgotPasswordRequest extends FormRequest
{
    use WithUserRules;

    /**
     * {@inheritDoc}
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'exists:users,email'],
        ];
    }
}
