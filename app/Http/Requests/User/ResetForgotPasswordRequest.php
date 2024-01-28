<?php

namespace App\Http\Requests\User;

use App\Rules\PasswordRule;
use App\Traits\Requests\WithUserRules;
use Raid\Core\Request\Requests\FormRequest;

class ResetForgotPasswordRequest extends FormRequest
{
    use WithUserRules;

    /**
     * {@inheritDoc}
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'exists:users,email'],
            'token' => ['required'],
            'password' => ['required', 'string', PasswordRule::make()],
            'password_confirmation' => ['required', 'same:password'],
        ];
    }
}
