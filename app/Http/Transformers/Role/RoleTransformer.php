<?php

namespace App\Http\Transformers\Role;

use App\Models\Role;
use Raid\Core\Repository\Transformers\Transformer;

class RoleTransformer extends Transformer
{
    /**
     * Transform a given model.
     */
    public function transform(Role $role): array
    {
        return [
            'id' => $role->attribute('id'),
            'name' => $role->attribute('name'),
        ];
    }
}
