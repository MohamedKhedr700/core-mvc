<?php

namespace App\Http\Authentication\Authenticators;

use App\Models\User;
use Raid\Core\Auth\Authentication\Authenticator;

class UserAuthenticator extends Authenticator
{
    /**
     * {@inheritdoc}
     */
    public const AUTHENTICATOR = 'user';

    /**
     * {@inheritdoc}
     */
    public const AUTHENTICATABLE = User::class;
}
