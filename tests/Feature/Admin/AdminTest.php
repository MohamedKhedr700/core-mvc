<?php

namespace Tests\Feature\Admin;

use App\Actions\Admin\SendForgotPasswordAction;
use App\Models\Admin;

trait AdminTest
{
    /**
     * The test uri.
     */
    public string $uri = '/api/v1/admin/admins';

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
            'account_type',
            'createdAt',
            'updatedAt',
        ];
    }

    /**
     * Get test rest token.
     */
    public function resetToken(Admin $admin): string
    {
        return SendForgotPasswordAction::exec($admin->attributes('email'))['token'] ?? '';
    }
}
