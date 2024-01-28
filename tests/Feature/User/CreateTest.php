<?php

it('can not create a user when unauthorized', function () {
    $this->postJson($this->uri(), $this->body())
        ->assertStatus(401)
        ->assertJsonStructure(['message']);
});

it('can create a user when authorized', function () {
    admin()->postJson($this->uri(), $this->body())
        ->assertStatus(200)
        ->assertJsonStructure(['message']);
});
