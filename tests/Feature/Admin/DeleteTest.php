<?php

uses(\Tests\Feature\Admin\AdminTest::class);

it('can not delete admin when unauthorized', function () {

    $this->deleteJson($this->uri(admin_account()->accountId()))
        ->assertStatus(401)
        ->assertJsonStructure(['message']);
});

it('can delete admin when authorized', function () {

    admin()->deleteJson($this->uri(admin_account()->accountId()))
        ->assertStatus(200)
        ->assertJsonStructure(['message']);
});

it('can receive not found exception when using wrong admin id', function () {

    admin()->deleteJson($this->uri('wrong-id'))
        ->assertStatus(404)
        ->assertJsonStructure(['message']);
});
