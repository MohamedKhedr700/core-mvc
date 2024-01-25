<?php

namespace Tests\Feature\Admin;

trait AdminTest
{
    /**
     * The test uri.
     */
    public string $uri = '/api/v1/admin/admins';

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
