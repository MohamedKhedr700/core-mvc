<?php

it('can not get an admin profile when unauthorized', function () {

    $this->getJson($this->uri('/profile'))
        ->assertStatus(401)
        ->assertJsonStructure(['message']);
});

it('can get an admin profile when authorized', function () {

    admin()->getJson($this->uri('/profile'))
        ->assertStatus(200)
        ->assertJsonStructure([
            'message',
            'resource' => $this->resource(),
        ]);
});
