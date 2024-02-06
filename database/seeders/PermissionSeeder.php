<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin;
use Database\Factories\PermissionFactory;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $factory = PermissionFactory::new();

        $this->seed($factory);
    }

    /**
     * Seed.
     */
    private function seed(PermissionFactory $factory): void
    {
        foreach ($factory->getPermissions() as $permission) {
            $factory->create([
                'name' => $permission,
                'guard_name' => 'admin',
            ]);
        }
    }
}
