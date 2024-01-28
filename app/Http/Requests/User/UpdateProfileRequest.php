<?php

namespace App\Http\Requests\User;

use App\Traits\Requests\WithAdminRules;
use App\Traits\Requests\WithUserRules;
use Raid\Core\Request\Requests\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    use WithUserRules;

    /**
     * {@inheritDoc}
     */
    public function rules(): array
    {
        return $this->withCommonRules([
            'name' => ['sometimes'],
            'email' => ['sometimes'],
            'password' => ['sometimes'],
        ]);
    }
}
