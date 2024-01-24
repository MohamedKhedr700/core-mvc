<?php

namespace Feature\Admin;

use App\Models\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ListAdminTest extends TestCase
{
    /**
     * {@inheritDoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(Admin::factory()->create());
    }

    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->getJson('/api/v1/admin/admins');

        $response->assertStatus(200);

        $response->assertJsonStructure(['message', 'resources']);
    }
}
