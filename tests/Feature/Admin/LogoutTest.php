<?php

it('can not logout an admin when unauthorized', function () {

    $this->getJson($this->uri('/profile/logout'))
        ->assertStatus(401)
        ->assertJsonStructure(['message']);
});

it('can logout an admin when authorized', function () {

    admin()->withToken(token())->getJson($this->uri('/profile/logout'))
        ->assertStatus(200)
        ->assertJsonStructure(['message']);
})->group('logout');
