<?php

namespace App\Traits\Requests;

use App\Rules\PasswordRule;

trait WithUserRules
{
    /**
     * Define common rules.
     */
    public function commonRules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string', PasswordRule::make()],
        ];
    }

    /**
     * Define common attributes.
     */
    public function attributes(): array
    {
        return [
            'name' => __('name'),
            'email' => __('email'),
            'password' => __('password'),
        ];
    }
}
