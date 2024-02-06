<?php

namespace App\Traits\Seeders;

trait WithModel
{
    /**
     * Seeder model class.
     */
    protected string $model;

    /**
     * Get a model class.
     */
    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    /**
     * Get a model class.
     */
    public function model(): ?string
    {
        return $this->model ?? null;
    }
}
