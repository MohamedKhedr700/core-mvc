<?php

it('can not attach a user wishlist product when unauthorized', function () {

    $this->postJson($this->uri('/attach'), $this->body())
        ->assertStatus(401)
        ->assertJsonStructure(['message']);
});

it('can attach a user wishlist product when authorized', function () {

    user()->postJson($this->uri('/attach'), $this->body())
        ->assertStatus(200)
        ->assertJsonStructure(['message']);
});

it('can receive validation exception on attach a user wishlist product', function () {

    user()->postJson($this->uri('/attach'), [])
        ->assertStatus(422)
        ->assertJsonStructure([
            'error',
            'message',
            'errors' => [
                'productId',
            ],
        ]);
});

it('can receive validation exception on attach a user wishlist using wrong product id', function () {

    $body = [
        'productId' => 'wrong-id',
    ];

    user()->postJson($this->uri('/attach'), $body)
        ->assertStatus(422)
        ->assertJsonStructure([
            'error',
            'message',
            'errors' => [
                'productId',
            ],
        ]);
});
