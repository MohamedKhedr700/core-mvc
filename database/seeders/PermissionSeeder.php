<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        $this->seedPermissions($factory);
    }

    /**
     * Seed all permissions.
     */
    private function seedPermissions(PermissionFactory $factory): void
    {
        foreach ($factory->getPermissions() as $permission) {
            $factory->create(['name' => $permission]);
        }
    }
}
