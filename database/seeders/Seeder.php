<?php

namespace Database\Seeders;

use App\Traits\Seeders\WithFactory;
use App\Traits\Seeders\HasModel;
use Exception;
use Illuminate\Database\Seeder as IlluminateSeeder;

class Seeder extends IlluminateSeeder
{
    use HasModel;
    use WithFactory;

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
