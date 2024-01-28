<?php

namespace Tests\Unit\Admin;

use App\Models\Admin;

trait AdminTest
{
    /**
     * Get test record.
     */
    public function record(array $data = []): Admin
    {
        return factory(Admin::class, $data);
    }

    /**
     * Get test body.
     */
    public function body(): array
    {
        return [
            'name' => fake()->name,
            'email' => fake()->email,
            'password' => fake()->password(8),
        ];
    }

    /**
     * Get test resource
     */
    public function resource(): array
    {
        return [
            'id',
            'name',
            'email',
            'account_type',
            'created_at',
            'updated_at',
        ];
    }
}
