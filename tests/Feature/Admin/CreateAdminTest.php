<?php

const URL = '/api/v1/admin/admins';

it('cannot create admin when unauthorized', function () {
    $this->postJson(URL, get_body())
        ->assertStatus(401)
        ->assertJsonStructure(['message']);
});

it('can create admin when authorized', function () {
    login_admin()->postJson(URL, get_body())
        ->assertStatus(200)
        ->assertJsonStructure(['message']);
});

it('can receive validation exception on create admin', function () {
    login_admin()->postJson(URL, [])
        ->assertStatus(422)
        ->assertJsonStructure([
            'error',
            'message',
            'errors' => [
                'name',
                'email',
                'password',
            ],
        ]);
});

function get_body(): array
{
    return [
        'name' => fake()->name,
        'email' => fake()->email,
        'password' => fake()->password(8),
    ];
}
