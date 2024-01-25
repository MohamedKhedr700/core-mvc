<?php

uses(\Tests\Feature\Admin\AdminTest::class);

it('cannot create admin when unauthorized', function () {

    $this->postJson($this->uri(), $this->body())
        ->assertStatus(401)
        ->assertJsonStructure(['message']);
});

it('can create admin when authorized', function () {

    admin()->postJson($this->uri(), $this->body())
        ->assertStatus(200)
        ->assertJsonStructure(['message']);
});

it('can receive validation exception on create admin', function () {

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
