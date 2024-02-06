<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin;
use App\Utilities\RoleUtility;
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
        $this->seedAdministrator();
        $this->seedAssistant();
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

        $admin->assignRole('administrator');
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

        $admin->assignRole('assistant');
    }
}
