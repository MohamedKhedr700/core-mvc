<?php

it('cannot update a user when unauthorized', function () {

    $this->putJson($this->uri($this->record()->getId()), $this->body())
        ->assertStatus(401)
        ->assertJsonStructure(['message']);
});

it('can update a user when authorized', function () {

    admin()->putJson($this->uri($this->record()->getId()), $this->body())
        ->assertStatus(200)
        ->assertJsonStructure(['message']);
});

it('can receive validation exception on update a user', function () {

    admin()->putJson($this->uri($this->record()->getId()), $this->emptyBody())
        ->assertStatus(422)
        ->assertJsonStructure([
            'error',
            'message',
            'errors' => [
                'name',
                'email',
                'password',
            ],
        ]);
});

it('can receive not found exception when using a wrong user id', function () {

    admin()->getJson($this->uri('/wrong-id'), $this->body())
        ->assertStatus(404)
        ->assertJsonStructure(['message']);
});
