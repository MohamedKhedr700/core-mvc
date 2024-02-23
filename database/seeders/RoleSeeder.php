<?php

namespace Database\Seeders;

use App\Enums\Role as RoleEnum;
use App\Models\Permission;
use App\Models\Role;
use App\Utilities\RoleUtility;
use Exception;

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
        $this->seedRoles([
            RoleEnum::MANAGEMENT,
            RoleEnum::ADMINISTRATOR,
            RoleEnum::ASSISTANT,
        ]);
    }

    /**
     * Seed roles.
     *
     * @throws Exception
     */
    private function seedRoles(array $roles = []): void
    {
        foreach (RoleUtility::getRoles($roles) as $role => $configuration) {
            $this->seedRole($role, $configuration);
        }
    }

    /**
     * Seed role.
     *
     * @throws Exception
     */
    private function seedRole(string $role, array $configuration): void
    {
        $this->sync(
            $this->factory()->create(['name' => $role]),
            $configuration,
        );
    }

    /**
     * Sync role permissions.
     */
    private function sync(Role $role, array $configuration): void
    {
        $permissions = RoleUtility::getPermissions(
            $configuration['models'],
            $configuration['actions'],
            $configuration['permissions'],
        );

        $role->syncPermissions(Permission::findByNames($permissions));
    }
}
