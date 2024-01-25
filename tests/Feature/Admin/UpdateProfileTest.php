<?php

it('can not update admin profile when unauthorized', function () {

    $this->postJson($this->uri('profile'))
        ->assertStatus(401)
        ->assertJsonStructure(['message']);
});

it('can update admin profile when authorized', function () {

    admin()->postJson($this->uri('profile'), $this->body())
        ->assertStatus(200)
        ->assertJsonStructure(['message']);
});

it('can receive validation exception on update admin profile', function () {

    admin()->postJson($this->uri('profile'), [])
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
