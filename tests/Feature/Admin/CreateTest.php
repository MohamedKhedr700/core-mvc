<?php

it('cannot create an admin when unauthorized', function () {

    $this->postJson($this->uri(), $this->body())
        ->assertStatus(401)
        ->assertJsonStructure(['message']);
});

it('can create an admin when authorized', function () {

    admin()->postJson($this->uri(), $this->body())
        ->assertStatus(200)
        ->assertJsonStructure(['message']);
});

it('can receive validation exception on create an admin', function () {

    admin()->postJson($this->uri(), [])
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
