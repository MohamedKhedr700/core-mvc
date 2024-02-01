<?php

it('can not detach a user wishlist product when unauthorized', function () {

    $this->postJson($this->uri('/detach'), $this->body())
        ->assertStatus(401)
        ->assertJsonStructure(['message']);
});

it('can detach a user wishlist product when authorized', function () {

    $user = user();

    $body = $this->body();

    $this->attach($body);

    $user->postJson($this->uri('/detach'), $body)
        ->assertStatus(200)
        ->assertJsonStructure(['message']);
});

it('can receive validation exception on detach a user wishlist product', function () {

    $user = user();

    $this->attach($this->body());

    $user->postJson($this->uri('/detach'), [])
        ->assertStatus(422)
        ->assertJsonStructure([
            'error',
            'message',
            'errors' => [
                'productId',
            ],
        ]);
});

it('can receive validation exception on detach a user wishlist using wrong product id', function () {

    $user = user();

    $this->attach($this->body());

    $body = [
        'productId' => 'wrong-id',
    ];

    $user->postJson($this->uri('/detach'), $body)
        ->assertStatus(422)
        ->assertJsonStructure([
            'error',
            'message',
            'errors' => [
                'productId',
            ],
        ]);
});
