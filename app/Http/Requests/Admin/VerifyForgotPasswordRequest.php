<?php

namespace App\Http\Requests\Admin;

use App\Traits\Requests\WithAdminRules;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator;
use Raid\Core\Request\Requests\FormRequest;

class VerifyForgotPasswordRequest extends FormRequest
{
    use WithAdminRules;

    /**
     * After validation hook.
     */
    public function withValidator(Validator $validator): void
    {
        $validator->after(function ($validator) {
            $this->validateEmailAndToken($validator);
        });
    }

    /**
     * Validate email and token.
     */
    protected function validateEmailAndToken(Validator $validator): void
    {
        $valid = DB::table('password_reset_tokens')
            ->where('email', $this->route('email'))
//            ->where('token', $this->route('token'))
            ->count();

        if ($valid) {
            return;
        }

        $validator->errors()->add('error', __('password_reset_not_found'));
    }
}
