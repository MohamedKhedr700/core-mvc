<?php

//
//namespace Feature\Admin;
//
//use App\Models\Admin;
//use Illuminate\Foundation\Testing\RefreshDatabase;
//use Tests\TestCase;
//
//class ListAdminTest extends TestCase
//{
//    use RefreshDatabase;
//
//    /**
//     * {@inheritDoc}
//     */
//    protected function setUp(): void
//    {
//        parent::setUp();
//
//        $this->setOwner(Admin::factory()->create());
//    }
//
//    /**
//     * Test is unauthorized owner cannot list admins.
//     */
//    public function test_is_unauthenticated_owner_can_not_list_admin()
//    {
//        $response = $this->getJson('/api/v1/admin/admins');
//
//        $response->assertStatus(401);
//
//        $response->assertJsonStructure(['message']);
//
//    }
//
//    /**
//     * Test is authorized owner can list admins.
//     */
//    public function test_is_authorized_owner_can_list_admin(): void
//    {
//        $response = $this->actingAs($this->owner())->getJson('/api/v1/admin/admins');
//
//        $response->assertStatus(200);
//
//        $response->assertJsonStructure([
//            'message',
//            'resources' => [
//                [
//                    'id',
//                    'name',
//                    'email',
//                    'account_type',
//                    'created_at',
//                    'updated_at',
//                ],
//            ],
//        ]);
//    }
//}
