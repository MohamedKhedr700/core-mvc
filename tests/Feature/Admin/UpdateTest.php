<?php

it('cannot update an admin when unauthorized', function () {

    $this->putJson($this->uri($this->record()->attribute('id')), $this->body())
        ->assertStatus(401)
        ->assertJsonStructure(['message']);
});

it('can update an admin when authorized', function () {

    admin()->putJson($this->uri($this->record()->attribute('id')), $this->body())
        ->assertStatus(200)
        ->assertJsonStructure(['message']);
});

it('can receive validation exception on update an admin', function () {

    admin()->putJson($this->uri($this->record()->attribute('id')), [])
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

it('can receive not found exception when using wrong admin id', function () {

    admin()->getJson($this->uri('/wrong-id'), $this->body())
        ->assertStatus(404)
        ->assertJsonStructure(['message']);
});
