<?php

it('can login admin with existing credentials', function () {

    $password = 'password';

    $admin = $this->record([
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

it('can not login admin with not found email', function () {

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
        ->assertJsonStructure(['errors']);
});
