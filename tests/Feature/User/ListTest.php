<?php

it('can not list an user when unauthorized', function () {

    $this->getJson($this->uri())
        ->assertStatus(401)
        ->assertJsonStructure(['message']);
});

it('can list an user when authorized', function () {

    admin()->getJson($this->uri())
        ->assertStatus(200)
        ->assertJsonStructure([
            'message',
            'resources' => [
                $this->resource(),
            ],
        ]);
});
