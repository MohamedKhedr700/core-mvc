<?php

it('can login a user', function () {

    $password = 'password';

    $user = $this->record([
        'password' => $password,
    ]);

    $body = [
        'email' => $user->attribute('email'),
        'password' => $password,
    ];

    $this->postJson($this->uri('/login'), $body)
        ->assertStatus(200)
        ->assertJsonStructure([
            'message',
            'token',
            'resource' => $this->resource(),
        ]);
});

it('can receive validation exception on login a user', function () {

    $this->postJson($this->uri('/login'), [])
        ->assertStatus(422)
        ->assertJsonStructure([
            'error',
            'message',
            'errors' => [
                'email',
                'password',
            ],
        ]);
});

it('can receive validation exception on login a user with not found email', function () {

    $password = 'password';

    $this->record([
        'password' => $password,
    ]);

    $body = [
        'email' => 'not-found@email.com',
        'password' => $password,
    ];

    $this->postJson($this->uri('/login'), $body)
        ->assertStatus(422)
        ->assertJsonStructure([
            'error',
            'message',
            'errors' => [
                'error',
            ],
        ]);
});

it('can receive validation exception on login a user with wrong password', function () {

    $password = 'password';

    $user = $this->record([
        'password' => $password,
    ]);

    $body = [
        'email' => $user->attribute('email'),
        'password' => 'wrong-password',
    ];

    $this->postJson($this->uri('/login'), $body)
        ->assertStatus(422)
        ->assertJsonStructure([
            'error',
            'message',
            'errors' => [
                'error',
            ],
        ]);
});
