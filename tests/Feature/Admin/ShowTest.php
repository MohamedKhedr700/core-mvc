<?php

uses(\Tests\Feature\Admin\AdminTest::class);

it('can not show admin when unauthorized', function () {

    $this->getJson($this->uri(admin_account()->accountId()))
        ->assertStatus(401)
        ->assertJsonStructure(['message']);
});

it('can show admin when authorized', function () {

    admin()->getJson($this->uri(admin_account()->accountId()))
        ->assertStatus(200)
        ->assertJsonStructure([
            'message',
            'resource' => [
                'id',
                'name',
                'email',
                'account_type',
                'created_at',
                'updated_at',
            ],
        ]);
});

it('can receive not found exception when using wrong admin id', function () {

    admin()->getJson($this->uri('wrong-id'))
        ->assertStatus(404)
        ->assertJsonStructure(['message']);
});
