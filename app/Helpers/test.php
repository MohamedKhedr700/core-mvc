<?php

use Illuminate\Contracts\Auth\Authenticatable;
use Raid\Core\Model\Models\Model;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Factories\Factory;

if (! function_exists('factory')) {
    /**
     * Get factory instance for a given model.
     */
    function factory(string $model, array $data = [])
    {
        return $model::factory()->create($data);
    }
}

if (! function_exists('login')) {
    /**
     * Login authenticatable as a test owner.
     */
    function login(Authenticatable $authenticatable, ?string $guard = null): TestCase
    {
        test()->setOwner($authenticatable);

        return test()->actingAs(test()->owner(), $guard);
    }
}

if (! function_exists('admin')) {
    /**
     * Login admin as a test owner.
     */
    function admin(array $data = []): TestCase
    {
        return login(test()->record($data), 'admin');
    }
}

if (! function_exists('user')) {
    /**
     * Login user as a test owner.
     */
    function user(array $data = []): TestCase
    {
        return login(test()->record($data), 'user');
    }
}

if (! function_exists('token')) {
    /**
     * Get test owner token.
     */
    function token(): string
    {
        return test()->owner()->createToken('test-token')->plainTextToken;
    }
}
