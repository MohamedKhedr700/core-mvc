<?php

namespace Database\Seeders;

use App\Traits\Seeders\WithFactory;
use App\Traits\Seeders\WithModel;
use Exception;
use Illuminate\Database\Seeder as IlluminateSeeder;

class Seeder extends IlluminateSeeder
{
    use WithFactory;
    use WithModel;

    /**
     * Seed the application's database.
     *
     * @throws Exception
     */
    public function run(): void
    {
        $this->factory()->create();
    }
}
