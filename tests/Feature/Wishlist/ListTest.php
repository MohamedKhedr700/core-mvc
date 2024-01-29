<?php

it('can not list a user wishlist when unauthorized', function () {

    $this->getJson($this->uri())
        ->assertStatus(401)
        ->assertJsonStructure(['message']);
});

it('can list a user wishlist when authorized', function () {

    $user = user();

    $this->createWishlist();

    $user->getJson($this->uri())
        ->assertStatus(200)
        ->assertJsonStructure([
            'message',
            'resources' => [
                $this->resource(),
            ],
        ]);
});
