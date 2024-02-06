<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Utilities\RoleUtility;

class RoleSeeder extends Seeder
{
    /**
     * {@inheritdoc}
     */
    protected string $model = Role::class;

    /**
     * {@inheritDoc}
     */
    public function run(): void
    {
        $this->seedAdministrator();
        $this->seedAssistant();
    }

    /**
     * Seed administrator.
     */
    private function seedAdministrator(): void
    {
        $role = $this->factory()->create(['name' => 'administrator']);

        $this->sync($role, RoleUtility::administrator());
    }

    /**
     * Seed assistant.
     */
    private function seedAssistant(): void
    {
        $role = $this->factory()->create(['name' => 'assistant']);

        $this->sync($role, RoleUtility::assistant());
    }

    /**
     * Sync role permissions.
     */
    private function sync(Role $role, array $data): void
    {
        $permissions = RoleUtility::getPermissions(
            $data['models'],
            $data['actions'],
            $data['permissions'],
        );

        $role->syncPermissions(Permission::findByNames($permissions));
    }
}
