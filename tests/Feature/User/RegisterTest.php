<?php

it('can register a user', function () {

   $this->postJson($this->uri('/register'), $this->body())
       ->assertStatus(200)
       ->assertJsonStructure([
           'message',
           'token',
           'resource' => $this->resource(),
       ]);
});

it('can receive validation exception on register a user', function () {

    $this->postJson($this->uri('/register'), [])
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
