<?php

namespace App\Http\Requests\Permission;

use App\Traits\Requests\WithPermissionRules;
use Raid\Core\Request\Requests\FormRequest;

class ListRequest extends FormRequest
{
    use WithPermissionRules;

    /**
     * {@inheritDoc}
     */
    public function rules(): array
    {
        return [
            'page' => ['nullable', 'int', 'min:1'],
            'perPage' => ['nullable', 'int', 'min:1'],
        ];
    }
}
