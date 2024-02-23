<?php

namespace App\Traits\Requests;

trait WithRoleRules
{
    /**
     * Define common rules.
     */
    public function commonRules(): array
    {
        return [];
    }

    /**
     * Define common attributes.
     */
    public function attributes(): array
    {
        return [];
    }
}
