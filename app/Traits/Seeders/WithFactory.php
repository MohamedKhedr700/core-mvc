<?php

namespace App\Traits\Seeders;

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
     */
    public function factory(): Factory
    {
        if (! isset($this->factory)) {
            $this->factory = $this->model()::factory();
        }

        return $this->factory;
    }
}
