<?php

it('can not list an admin when unauthorized', function () {

    $this->getJson($this->uri())
        ->assertStatus(401)
        ->assertJsonStructure(['message']);
});

it('can list an admin when authorized', function () {

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
