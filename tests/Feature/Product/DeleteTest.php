<?php

it('can not delete a product when unauthorized', function () {

    $this->deleteJson($this->uri($this->record()->getId()))
        ->assertStatus(401)
        ->assertJsonStructure(['message']);
});

it('can delete a product when authorized', function () {

    admin()->deleteJson($this->uri($this->record()->getId()))
        ->assertStatus(200)
        ->assertJsonStructure(['message']);
});

it('can receive not found exception when using wrong a product id', function () {

    admin()->deleteJson($this->uri('/wrong-id'))
        ->assertStatus(404)
        ->assertJsonStructure(['message']);
});
