<?php

const URI = '/api/v1/admin/admins';

it('can not list admin when unauthorized', function () {
    $this->getJson(URI)
        ->assertStatus(401)
        ->assertJsonStructure(['message']);
});

it('can list admin when authorized', function () {
    admin()->getJson(URI)
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
