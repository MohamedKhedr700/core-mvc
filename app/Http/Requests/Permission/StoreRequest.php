<?php

namespace App\Http\Requests\Permission;

use App\Traits\Requests\WithPermissionRules;
use Raid\Core\Request\Requests\FormRequest;

class StoreRequest extends FormRequest
{
    use WithPermissionRules;

    /**
     * {@inheritDoc}
     */
    public function rules(): array
    {
        return $this->withCommonRules();
    }
}
