<?php

namespace Tests;

use Illuminate\Contracts\Auth\Authenticatable;
use Raid\Core\Auth\Models\Authentication\Contracts\AccountInterface;

trait HasOwner
{
    /**
     * Authenticatable owner instance.
     */
    private Authenticatable $owner;

    /**
     * Ser owner instance.
     */
    public function setOwner(Authenticatable $owner): void
    {
        $this->owner = $owner;
    }

    /**
     * Get an owner instance.
     */
    public function owner(): Authenticatable
    {
        return $this->owner;
    }
}
