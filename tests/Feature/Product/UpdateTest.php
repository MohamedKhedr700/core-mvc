<?php

it('cannot update a product when unauthorized', function () {

    $this->putJson($this->uri($this->record()->attribute('id')), $this->body())
        ->assertStatus(401)
        ->assertJsonStructure(['message']);
});

it('can update a product when authorized', function () {

    admin()->putJson($this->uri($this->record()->attribute('id')), $this->body())
        ->assertStatus(200)
        ->assertJsonStructure(['message']);
});

it('can receive validation exception on update a product', function () {

    admin()->putJson($this->uri($this->record()->attribute('id')), $this->emptyBody())
        ->assertStatus(422)
        ->assertJsonStructure([
            'error',
            'message',
            'errors' => [
                'name',
                'price',
                'description',
                'image',
            ],
        ]);
});

it('can receive not found exception when using wrong a product id', function () {

    admin()->getJson($this->uri('/wrong-id'), $this->body())
        ->assertStatus(404)
        ->assertJsonStructure(['message']);
});
