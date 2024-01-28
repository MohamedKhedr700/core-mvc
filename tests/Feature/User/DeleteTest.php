<?php

it('can not delete a user when unauthorized', function () {

    $this->deleteJson($this->uri($this->record()->attribute('id')))
        ->assertStatus(401)
        ->assertJsonStructure(['message']);
});

it('can delete a user when authorized', function () {

    admin()->deleteJson($this->uri($this->record()->attribute('id')))
        ->assertStatus(200)
        ->assertJsonStructure(['message']);
});

it('can receive not found exception when using wrong a user id', function () {

    admin()->deleteJson($this->uri('/wrong-id'))
        ->assertStatus(404)
        ->assertJsonStructure(['message']);
});
