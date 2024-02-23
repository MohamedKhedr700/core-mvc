<?php

namespace App\Traits\Requests;

trait WithRoleRules
{
    /**
     * Define common rules.
     */
    public function commonRules(): array
    {
        return [
            'name' => ['required', 'string', 'unique:roles,name'],
        ];
    }

    /**
     * Define common attributes.
     */
    public function attributes(): array
    {
        return [
            'name' => __('name'),
        ];
    }
}
