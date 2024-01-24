<?php

namespace App\Rules;

use Illuminate\Validation\Rules\Password;

class PasswordRule
{
    /**
     * Make password rule class.
     */
    public static function make(): Password
    {
        return Password::min(8);
    }
}
