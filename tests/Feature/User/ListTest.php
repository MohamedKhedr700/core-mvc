<?php

it('can not list a user when unauthorized', function () {

    $this->getJson($this->uri())
        ->assertStatus(401)
        ->assertJsonStructure(['message']);
});

it('can list a user when authorized', function () {

    $this->record();

    admin()->getJson($this->uri())
        ->assertStatus(200)
        ->assertJsonStructure([
            'message',
            'resources' => [
                $this->resource(),
            ],
        ]);
});
