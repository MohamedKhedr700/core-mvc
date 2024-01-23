<?php

namespace App\Traits\Models;

trait CanForgotPassword
{
    /**
     * {@inheritDoc}
     */
    public function getEmailForPasswordReset()
    {
        return $this->attribute('email');
    }

    /**
     * {@inheritDoc}
     */
    public function sendPasswordResetNotification($token): void
    {
    }
}
