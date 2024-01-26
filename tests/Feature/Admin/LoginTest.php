<?php

it('can login admin', function () {

    $password = 'password';

    $admin = admin_account([
        'password' => $password,
    ]);

    $body = [
        'email' => $admin->attribute('email'),
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

it('can receive validation exception on login admin', function () {

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
