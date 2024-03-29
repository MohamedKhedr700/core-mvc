<?php

it('can not delete an admin when unauthorized', function () {

    $this->deleteJson($this->uri($this->record()->getId()))
        ->assertStatus(401)
        ->assertJsonStructure(['message']);
});

it('can delete an admin when authorized', function () {

    admin()->deleteJson($this->uri($this->record()->getId()))
        ->assertStatus(200)
        ->assertJsonStructure(['message']);
});

it('can receive not found exception when using a wrong admin id', function () {

    admin()->deleteJson($this->uri('/wrong-id'))
        ->assertStatus(404)
        ->assertJsonStructure(['message']);
});
