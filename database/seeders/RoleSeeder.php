<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin;
use App\Models\Permission;
use App\Utilities\PermissionUtility;
use Database\Factories\PermissionFactory;
use Database\Factories\RoleFactory;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $factory = RoleFactory::new();

        $this->seedAdministrator($factory);
        $this->seedAssistant($factory);
    }

    /**
     * Seed administrator.
     */
    private function seedAdministrator(RoleFactory $factory): void
    {
        $role = $factory->create([
            'name' => 'administrator',
            'guard_name' => 'admin',
        ]);

        $permissions = PermissionUtility::getPermissions(...PermissionUtility::administrator());

        $role->syncPermissions(PermissionUtility::filter($permissions));
    }

    /**
     * Seed assistant.
     */
    private function seedAssistant(RoleFactory $factory): void
    {
        $role = $factory->create([
            'name' => 'assistant',
            'guard_name' => 'admin',
        ]);

        $permissions = PermissionUtility::getPermissions(...PermissionUtility::assistant());

        $role->syncPermissions(PermissionUtility::filter($permissions));
    }
}
