<?php

namespace App\Traits\Seeders;

use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;

trait WithFactory
{
    /**
     * Seeder factory instance.
     */
    protected Factory $factory;

    /**
     * Get a factory class.
     */
    public function setFactory(Factory $factory): void
    {
        $this->factory = $factory;
    }

    /**
     * Get a factory class.
     *
     * @throws Exception
     */
    public function factory(): Factory
    {
        if (! isset($this->factory)) {
            $this->factory = $this->newFactory();
        }

        return $this->factory;
    }

    /**
     * Get a new model factory instance.
     *
     * @throws Exception
     */
    private function newFactory(): Factory
    {
        $model = $this->model();

        if (! $model) {
            throw new Exception('Seeder must define a model property class at '.static::class);
        }

        return $model::factory();
    }
}
