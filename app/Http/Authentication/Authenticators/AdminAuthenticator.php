<?php

namespace App\Http\Authentication\Authenticators;

use App\Models\Admin;
use Raid\Core\Auth\Authentication\Authenticator;

class AdminAuthenticator extends Authenticator
{
    /**
     * {@inheritdoc}
     */
    public const AUTHENTICATOR = 'admin';

    /**
     * {@inheritdoc}
     */
    public const AUTHENTICATABLE = Admin::class;
}
