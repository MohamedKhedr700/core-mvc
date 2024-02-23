<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enums\Role;
use App\Models\Admin;
use Exception;

class AdminSeeder extends Seeder
{
    /**
     * {@inheritdoc}
     */
    protected string $model = Admin::class;

    /**
     * {@inheritdoc}
     */
    public function run(): void
    {
        $this->seedManagement();
        $this->seedAdministrator();
        $this->seedAssistant();
    }

    /**
     * Seed management.
     */
    private function seedManagement(): void
    {
        $admin = $this->factory()->create([
            'name' => 'management',
            'email' => 'management@raid.net',
            'password' => 'password',
        ]);

        $admin->assignRole(Role::MANAGEMENT);
    }

    /**
     * Seed administrator.
     *
     * @throws Exception
     */
    private function seedAdministrator(): void
    {
        $admin = $this->factory()->create([
            'name' => 'administrator',
            'email' => 'administrator@raid.net',
            'password' => 'password',
        ]);

        $admin->assignRole(Role::ADMINISTRATOR);
    }

    /**
     * Seed assistant.
     *
     * @throws Exception
     */
    private function seedAssistant(): void
    {
        $admin = $this->factory()->create([
            'name' => 'assistant',
            'email' => 'assistant@raid.net',
            'password' => 'password',
        ]);

        $admin->assignRole(Role::ASSISTANT);
    }
}
