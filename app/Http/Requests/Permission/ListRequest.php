<?php

namespace App\Http\Requests\Permission;

use App\Traits\Requests\WithPaginationRules;
use App\Traits\Requests\WithPermissionRules;
use Raid\Core\Request\Requests\FormRequest;

class ListRequest extends FormRequest
{
    use WithPaginationRules;
    use WithPermissionRules;

    /**
     * {@inheritDoc}
     */
    public function rules(): array
    {
        return $this->withPaginationRules();
    }
}
