<?php

it('can not show an admin when unauthorized', function () {

    $this->getJson($this->uri($this->record()->getId()))
        ->assertStatus(401)
        ->assertJsonStructure(['message']);
});

it('can show an admin when authorized', function () {

    admin()->getJson($this->uri($this->record()->getId()))
        ->assertStatus(200)
        ->assertJsonStructure([
            'message',
            'resource' => $this->resource(),
        ]);
});

it('can receive not found exception when using a wrong admin id', function () {

    admin()->getJson($this->uri('/wrong-id'))
        ->assertStatus(404)
        ->assertJsonStructure(['message']);
});
