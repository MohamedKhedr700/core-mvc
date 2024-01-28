<?php

it('can not logout a user when unauthorized', function () {

    $this->getJson($this->uri('/profile/logout'))
        ->assertStatus(401)
        ->assertJsonStructure(['message']);
});

it('can logout a user when authorized', function () {

    admin()->withToken(token())->getJson($this->uri('/profile/logout'))
        ->assertStatus(200)
        ->assertJsonStructure(['message']);
});
