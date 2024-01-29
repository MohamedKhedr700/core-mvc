<?php

it('can not create a user wishlist when unauthorized', function () {

    $this->postJson($this->uri(), $this->body())
        ->assertStatus(401)
        ->assertJsonStructure(['message']);
});

it('can create a user wishlist when authorized', function () {

    user()->postJson($this->uri(), $this->body())
        ->assertStatus(200)
        ->assertJsonStructure(['message']);
});

it('can receive validation exception on create a user wishlist', function () {

        user()->postJson($this->uri(), [])
        ->assertStatus(422)
        ->assertJsonStructure([
            'error',
            'message',
            'errors' => [
                'productId',
            ],
        ]);
});

it('can receive validation exception on create a user wishlist using wrong product id', function () {

    $body = [
        'productId' => 'wrong-id',
    ];

    user()->postJson($this->uri(), $body)
        ->assertStatus(422)
        ->assertJsonStructure([
            'error',
            'message',
            'errors' => [
                'productId',
            ],
        ]);
});
