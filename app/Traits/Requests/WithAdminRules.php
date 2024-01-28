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
            'email' => ['required', 'email', 'unique:admins,email,'.$this->getRouteId()],
            'password' => ['required', 'string', 'confirmed', PasswordRule::make()],
        ];
    }
}
