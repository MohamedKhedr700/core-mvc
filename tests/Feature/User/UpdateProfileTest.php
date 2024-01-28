<?php

it('can not update a user profile when unauthorized', function () {

    $this->postJson($this->uri('/profile'))
        ->assertStatus(401)
        ->assertJsonStructure(['message']);
});

it('can update a user profile when authorized', function () {

    user()->postJson($this->uri('/profile'), $this->body())
        ->assertStatus(200)
        ->assertJsonStructure(['message']);
});

it('can receive validation exception on update a user profile', function () {

    user()->postJson($this->uri('/profile'), $this->emptyBody())
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
