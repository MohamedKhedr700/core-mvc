<?php

it('can not delete an admin when unauthorized', function () {

    $this->deleteJson($this->uri($this->record()->attribute('id')))
        ->assertStatus(401)
        ->assertJsonStructure(['message']);
});

it('can delete an admin when authorized', function () {

    admin()->deleteJson($this->uri($this->record()->attribute('id')))
        ->assertStatus(200)
        ->assertJsonStructure(['message']);
});

it('can receive not found exception when using wrong an admin id', function () {

    admin()->deleteJson($this->uri('/wrong-id'))
        ->assertStatus(404)
        ->assertJsonStructure(['message']);
});
