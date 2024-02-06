<?php

namespace Database\Seeders;

use App\Traits\Seeders\WithFactory;
use App\Traits\Seeders\WithModel;
use Illuminate\Database\Seeder as IlluminateSeeder;

class Seeder extends IlluminateSeeder
{
    use WithFactory;
    use WithModel;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->factory()->create();
    }
}
