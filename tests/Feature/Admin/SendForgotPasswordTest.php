<?php

it('can send admin forgot password', function () {

    $body = [
        'email' => $this->record()->attribute('email'),
    ];

    $this->postJson($this->uri('/forgot-password/send'), $body)
        ->assertStatus(200)
        ->assertJsonStructure(['message']);
});

it('can receive validation exception on send admin forgot password', function () {

    $this->postJson($this->uri('/forgot-password/send'), [])
        ->assertStatus(422)
        ->assertJsonStructure([
            'error',
            'message',
            'errors' => [
                'email',
            ],
        ]);
});

it('can receive not found email validation exception on send admin forgot password', function () {

    $body = [
        'email' => 'not-found@email.com',
    ];

    $this->postJson($this->uri('/forgot-password/send'), $body)
        ->assertStatus(422)
        ->assertJsonStructure([
            'error',
            'message',
            'errors' => [
                'email',
            ],
        ]);
});
