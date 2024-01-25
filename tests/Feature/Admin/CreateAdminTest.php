<?php

namespace Feature\Admin;

use App\Models\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateAdminTest extends TestCase
{
    use RefreshDatabase;

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->setOwner(Admin::factory()->create());
    }

    /**
     * Test is unauthorized owner cannot create admins.
     */
    public function test_is_unauthenticated_owner_can_not_create_admin()
    {
        $response = $this->postJson('/api/v1/admin/admins');

        $response->assertStatus(401);

        $response->assertJsonStructure(['message']);
    }

    /**
     * Test is authorized owner can create admins.
     */
    public function test_is_authorized_owner_can_create_admin(): void
    {
        $response = $this->actingAs($this->owner())->postJson('/api/v1/admin/admins', [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'password' => $this->faker->password(8),
        ]);

        $response->assertStatus(200);

        $response->assertJsonStructure(['message']);
    }

    /**
     * Test is authorized owner receive validation exception on create admin.
     */
    public function test_is_authorized_owner_receive_validation_exception_on_create_admin()
    {
        $response = $this->actingAs($this->owner())->postJson('/api/v1/admin/admins');

        $response->assertStatus(422);

        $response->assertJsonStructure([
            'error',
            'message',
            'errors' => [
                'name',
                'email',
                'password',
            ],
        ]);
    }
}
