<?php

namespace App\Traits\Requests;

use App\Rules\PasswordRule;

trait WithAdminRules
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
}
