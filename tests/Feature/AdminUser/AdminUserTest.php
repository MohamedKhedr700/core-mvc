<?php

namespace Tests\Feature\AdminUser;

use App\Actions\User\SendForgotPasswordAction;
use App\Models\User;

trait AdminUserTest
{
    /**
     * The test uri.
     */
    public string $uri = '/api/v1/admin/users';

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
            'password' => $password = fake()->password(8),
            'password_confirmation' => $password,
        ];
    }

    /**
     * Get test empty body.
     */
    public function emptyBody(): array
    {
        return [
            'name' => null,
            'email' => null,
            'password' => null,
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
            'accountType',
            'createdAt',
            'updatedAt',
        ];
    }

    /**
     * Get test rest token.
     */
    public function resetToken(User $user): string
    {
        return SendForgotPasswordAction::exec($user->attributes('email'))['token'] ?? '';
    }
}
