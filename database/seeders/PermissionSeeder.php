<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * {@inheritdoc}
     */
    protected string $model = Permission::class;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->seedPermissions();
    }

    /**
     * Seed all permissions.
     */
    private function seedPermissions(): void
    {
        foreach ($this->factory()->getPermissions() as $permission) {
            $this->factory()->create(['name' => $permission]);
        }
    }
}
