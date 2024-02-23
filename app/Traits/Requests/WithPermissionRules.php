<?php

namespace App\Traits\Requests;

trait WithPermissionRules
{
    /**
     * Define common rules.
     */
    public function commonRules(): array
    {
        return [
            'name' => ['required', 'string', 'unique:permissions,name'],
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
