<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Permission;
use App\Models\Role;
use App\Utilities\RoleUtility;
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

        $this->sync($role, RoleUtility::administrator());
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

        $this->sync($role, RoleUtility::assistant());
    }

    /**
     * Sync role permissions.
     */
    private function sync(Role $role, array $arguments): void
    {
        $permissions = RoleUtility::getPermissions(...$arguments);

        $role->syncPermissions(Permission::findByNames($permissions));
    }
}
