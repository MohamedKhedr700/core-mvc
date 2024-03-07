<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * {@inheritdoc}
     */
    protected string $model = Product::class;

    /**
     * Seed the application's database.
     *
     * @throws Exception
     */
    public function run(): void
    {
        $this->factory()
            ->count(100)
            ->create();
    }
}
