<?php

it('can reset a user forgot password', function () {

    $user = $this->record();

    $password = fake()->password(8);

    $body = [
        'email' => $user->attribute('email'),
        'token' => $this->resetToken($user),
        'password' => $password,
        'password_confirmation' => $password,
    ];

    $this->postJson($this->uri('/forgot-password/reset'), $body)
        ->assertStatus(200)
        ->assertJsonStructure(['message']);
});

it('can receive validation exception on reset a user forgot password', function () {

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

it('can receive not found email validation exception on reset a user forgot password', function () {

    $user = $this->record();

    $password = fake()->password(8);

    $body = [
        'email' => 'not-found@email.com',
        'token' => $this->resetToken($user),
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

it('can not reset a user forgot password using wrong token', function () {

    $user = $this->record();

    $this->resetToken($user);

    $password = fake()->password(8);

    $body = [
        'email' => $user->attribute('email'),
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
