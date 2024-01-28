<?php

it('can not delete an user when unauthorized', function () {

    $this->deleteJson($this->uri($this->record()->attribute('id')))
        ->assertStatus(401)
        ->assertJsonStructure(['message']);
});

it('can delete an user when authorized', function () {

    admin()->deleteJson($this->uri($this->record()->attribute('id')))
        ->assertStatus(200)
        ->assertJsonStructure(['message']);
});

it('can receive not found exception when using wrong user id', function () {

    admin()->deleteJson($this->uri('/wrong-id'))
        ->assertStatus(404)
        ->assertJsonStructure(['message']);
});
