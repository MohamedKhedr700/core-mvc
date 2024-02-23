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
            'createdAt' => $role->getAttribute('created_at')->toIsoString(),
            'updatedAt' => $role->getAttribute('updated_at')->toIsoString(),
        ];
    }
}
