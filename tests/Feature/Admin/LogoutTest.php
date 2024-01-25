<?php

it('can not logout admin when unauthorized', function () {

    $this->getJson($this->uri('profile/logout'))
        ->assertStatus(401)
        ->assertJsonStructure(['message']);
});

it('can logout admin when authorized', function () {

    $admin = admin();

    $token = $this->owner()->createAccountToken()->plainTextToken;

    $admin->withToken($token)->getJson($this->uri('profile/logout'))
        ->assertStatus(200)
        ->assertJsonStructure(['message']);
});
