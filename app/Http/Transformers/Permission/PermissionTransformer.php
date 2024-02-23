<?php

namespace App\Http\Transformers\Permission;

use App\Models\Permission;
use Raid\Core\Repository\Transformers\Transformer;

class PermissionTransformer extends Transformer
{
    /**
     * Transform a given model.
     */
    public function transform(Permission $permission): array
    {
        return [
            'id' => $permission->attribute('id'),
            'createdAt' => $permission->getAttribute('created_at')->toIsoString(),
            'updatedAt' => $permission->getAttribute('updated_at')->toIsoString(),
        ];
    }
}
