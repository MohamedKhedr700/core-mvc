<?php

uses(\Tests\Feature\Admin\AdminTest::class);

it('can not list admin when unauthorized', function () {

    $this->getJson($this->uri())
        ->assertStatus(401)
        ->assertJsonStructure(['message']);
});

it('can list admin when authorized', function () {

    admin()->getJson($this->uri())
        ->assertStatus(200)
        ->assertJsonStructure([
            'message',
            'resources' => [
                [
                    'id',
                    'name',
                    'email',
                    'account_type',
                    'created_at',
                    'updated_at',
                ],
            ],
        ]);
});
