<?php

use App\Enums\Role as RoleEnum;
use App\Models\Admin;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use App\Utilities\RoleUtility;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\Factory;
use Raid\Core\Model\Models\Model;
use Tests\TestCase;

if (! function_exists('factory')) {
    /**
     * Get factory instance for a given model.
     */
    function factory(string $model, array $data = [])
    {
        return $model::factory()->create($data);
    }
}

if (! function_exists('factory_make')) {
    /**
     * Get factory instance for a given model.
     */
    function factory_make(string $model, array $data = [])
    {
        return $model::factory()->make($data);
    }
}

if (! function_exists('login')) {
    /**
     * Login authenticatable as a test owner.
     */
    function login(Authenticatable $authenticatable, ?string $guard = null): TestCase
    {
        test()->setOwner($authenticatable);

        return test()->actingAs($authenticatable, $guard);
    }
}

if (! function_exists('admin')) {
    /**
     * Login admin as a test owner.
     */
    function admin(array $data = []): TestCase
    {
        $admin = factory(Admin::class, $data);

        $role = role(RoleEnum::MANAGEMENT);

        $admin->assignRole($role);

        return login($admin, 'admin');
    }
}

if (! function_exists('role')) {
    /**
     * Login admin as a test owner.
     */
    function role(string $role): Role
    {
        $configuredRole = RoleUtility::getRole($role);

        $permissions = permission(RoleUtility::getPermissions(
            $configuredRole['models'],
            $configuredRole['actions'],
            $configuredRole['permissions'],
        ));

        $role = factory(Role::class, ['name' => $role]);

        $role->syncPermissions($permissions);

        return $role;
    }
}

if (! function_exists('permission')) {
    /**
     * Login admin as a test owner.
     */
    function permission(array $permissions = []): array
    {
        $createdPermissions = [];

        foreach ($permissions as $permission) {
            $createdPermissions[] = factory(Permission::class, ['name' => $permission]);
        }

        return $createdPermissions;
    }
}

if (! function_exists('user')) {
    /**
     * Login user as a test owner.
     */
    function user(array $data = []): TestCase
    {
        return login(factory(User::class, $data), 'user');
    }
}

if (! function_exists('token')) {
    /**
     * Get test owner token.
     */
    function token(): string
    {
        return test()->owner()->createToken('test-token')->plainTextToken;
    }
}
