<?php

namespace App\Http\Requests\Admin;

use App\Traits\Requests\WithAdminRules;
use Raid\Core\Request\Requests\FormRequest;

class ListRequest extends FormRequest
{
    use WithAdminRules;

    /**
     * {@inheritDoc}
     */
    public function rules(): array
    {
        return [];
    }
}
