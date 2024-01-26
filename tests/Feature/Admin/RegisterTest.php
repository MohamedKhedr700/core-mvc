<?php

it('can not register an admin when unauthorized', function () {

    $this->postJson($this->uri('/register'), $this->body())
        ->assertStatus(401)
        ->assertJsonStructure(['message']);
});

it('can register an admin when authorized', function () {

    $headers = [
        'x-api-key' => config('app.api_key'),
    ];

    $this->postJson($this->uri('/register'), $this->body(), $headers)
        ->assertStatus(200)
        ->assertJsonStructure([
            'message',
            'token',
            'resource' => $this->resource(),
        ]);
});

it('can receive validation exception on register an admin', function () {

    $headers = [
        'x-api-key' => config('app.api_key'),
    ];

    $this->postJson($this->uri('/register'), [], $headers)
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
