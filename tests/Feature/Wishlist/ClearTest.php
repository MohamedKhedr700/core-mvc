<?php

it('can not clear a user wishlist products when unauthorized', function () {

    $this->deleteJson($this->uri('/clear'))
        ->assertStatus(401)
        ->assertJsonStructure(['message']);
});

it('can clear a user wishlist products when authorized', function () {

    $user = user();

    $this->attach($this->body());

    $user->deleteJson($this->uri('/clear'))
        ->assertStatus(200)
        ->assertJsonStructure(['message']);
});
