<?php

namespace App\Traits\Tests;

trait WithUri
{
    /**
     * Get test uri.
     */
    public function uri(?string $concat = null): string
    {
        return $concat ? ($this->uri ?? '').'/'.trim($concat, '/') : ($this->uri ?? '');
    }
}
