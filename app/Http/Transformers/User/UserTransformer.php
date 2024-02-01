<?php

namespace App\Http\Transformers\User;

use App\Models\User;
use Raid\Core\Repository\Transformers\Transformer;

class UserTransformer extends Transformer
{
    /**
     * Transform a given model.
     */
    public function transform(User $user): array
    {
        return [
            'id' => $user->attribute('id'),
            'name' => $user->attribute('name'),
            'email' => $user->attribute('email'),
            'accountType' => $user->attribute('account_type'),
            'createdAt' => $user->getAttribute('created_at')->toIsoString(),
            'updatedAt' => $user->getAttribute('updated_at')->toIsoString(),
        ];
    }
}
