<?php

namespace App\Http\Requests\Admin;

use App\Rules\PasswordRule;
use App\Traits\Requests\WithAdminRules;
use Raid\Core\Request\Requests\FormRequest;

class ResetForgotPasswordRequest extends FormRequest
{
    use WithAdminRules;

    /**
     * {@inheritDoc}
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'exists:admins,email'],
            'token' => ['required'],
            'password' => ['required', 'string', PasswordRule::make()],
            'password_confirmation' => ['required', 'same:password'],
        ];
    }
}
