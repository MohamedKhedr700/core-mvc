<?php

it('can not get admin profile when unauthorized', function () {

    $this->getJson($this->uri('profile'))
        ->assertStatus(401)
        ->assertJsonStructure(['message']);
});

it('can get admin profile when authorized', function () {

    admin()->getJson($this->uri('profile'))
        ->assertStatus(200)
        ->assertJsonStructure([
            'message',
            'resource' => $this->resource(),
        ]);
});
