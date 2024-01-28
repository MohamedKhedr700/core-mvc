<?php

namespace Tests\Feature\User;

use App\Models\User;

trait UserTest
{
    /**
     * The test uri.
     */
    public string $uri = '/api/v1/user/users';

    /**
     * Get test record.
     */
    public function record(array $data = []): User
    {
        return factory(User::class, $data);
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
