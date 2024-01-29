<?php

it('can not show a user product when unauthorized', function () {

    $this->getJson($this->uri($this->record()->getId()))
        ->assertStatus(401)
        ->assertJsonStructure(['message']);
});

it('can show a user product when authorized', function () {

    user()->getJson($this->uri($this->record()->getId()))
        ->assertStatus(200)
        ->assertJsonStructure([
            'message',
            'resource' => $this->resource(),
        ]);
});

it('can receive not found exception when using a wrong user product id', function () {

    user()->getJson($this->uri('/wrong-id'))
        ->assertStatus(404)
        ->assertJsonStructure(['message']);
});
