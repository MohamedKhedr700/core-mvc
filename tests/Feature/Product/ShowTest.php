<?php

it('can not show a product when unauthorized', function () {

    $this->getJson($this->uri($this->record()->attribute('id')))
        ->assertStatus(401)
        ->assertJsonStructure(['message']);
});

it('can show a product when authorized', function () {

    admin()->getJson($this->uri($this->record()->attribute('id')))
        ->assertStatus(200)
        ->assertJsonStructure([
            'message',
            'resource' => $this->resource(),
        ]);
});

it('can receive not found exception when using wrong a product id', function () {

    admin()->getJson($this->uri('/wrong-id'))
        ->assertStatus(404)
        ->assertJsonStructure(['message']);
});
