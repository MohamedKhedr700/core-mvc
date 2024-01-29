<?php

it('can reset an admin forgot password', function () {

    $admin = $this->record();

    $password = fake()->password(8);

    $body = [
        'email' => $admin->attribute('email'),
        'token' => $this->resetToken($admin),
        'password' => $password,
        'password_confirmation' => $password,
    ];

    $this->postJson($this->uri('/forgot-password/reset'), $body)
        ->assertStatus(200)
        ->assertJsonStructure(['message']);
});

it('can receive validation exception on reset an admin forgot password', function () {

    $this->postJson($this->uri('forgot-password/reset'), [])
        ->assertStatus(422)
        ->assertJsonStructure([
            'error',
            'message',
            'errors' => [
                'email',
                'token',
                'password',
                'password_confirmation',
            ],
        ]);
});

it('can receive not found email validation exception on reset an admin forgot password', function () {

    $admin = $this->record();

    $password = fake()->password(8);

    $body = [
        'email' => 'not-found@email.com',
        'token' => $this->resetToken($admin),
        'password' => $password,
        'password_confirmation' => $password,
    ];

    $this->postJson($this->uri('/forgot-password/reset'), $body)
        ->assertStatus(422)
        ->assertJsonStructure([
            'error',
            'message',
            'errors' => [
                'email',
            ],
        ]);
});

it('can receive validation exception on reset an admin forgot password using wrong token', function () {

    $admin = $this->record();

    $this->resetToken($admin);

    $password = fake()->password(8);

    $body = [
        'email' => $admin->attribute('email'),
        'token' => 'wrong-token',
        'password' => $password,
        'password_confirmation' => $password,
    ];

    $this->postJson($this->uri('/forgot-password/reset'), $body)
        ->assertStatus(422)
        ->assertJsonStructure([
            'error',
            'message',
            'errors',
        ]);
});
