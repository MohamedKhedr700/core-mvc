<?php

it('can not get a user profile when unauthorized', function () {

    $this->getJson($this->uri('/profile'))
        ->assertStatus(401)
        ->assertJsonStructure(['message']);
});

it('can get a user profile when authorized', function () {

    user()->getJson($this->uri('/profile'))
        ->assertStatus(200)
        ->assertJsonStructure([
            'message',
            'resource' => $this->resource(),
        ]);
});
