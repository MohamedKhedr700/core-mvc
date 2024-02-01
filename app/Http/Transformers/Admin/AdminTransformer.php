<?php

namespace App\Http\Transformers\Admin;

use App\Models\Admin;
use Raid\Core\Repository\Transformers\Transformer;

class AdminTransformer extends Transformer
{
    /**
     * Transform a given model.
     */
    public function transform(Admin $admin): array
    {
        return [
            'id' => $admin->attribute('id'),
            'name' => $admin->attribute('name'),
            'email' => $admin->attribute('email'),
            'accountType' => $admin->attribute('account_type'),
            'createdAt' => $admin->getAttribute('created_at')->toIsoString(),
            'updatedAt' => $admin->getAttribute('updated_at')->toIsoString(),
        ];
    }
}
