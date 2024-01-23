<?php

namespace App\Models;

use App\Traits\Models\CanForgotPassword;
use Illuminate\Contracts\Auth\CanResetPassword;
use Raid\Core\Auth\Authentication\Contracts\AuthenticatableInterface;
use Raid\Core\Auth\Models\Authentication\Account;
use Raid\Core\Auth\Traits\Model\Authenticatable;

class User extends Account implements AuthenticatableInterface, CanResetPassword
{
    use Authenticatable;
    use CanForgotPassword;

    /**
     * {@inheritdoc}
     */
    public const ACCOUNT_TYPE = 'user';

    /**
     * {@inheritdoc}
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * {@inheritdoc}
     */
    protected $hidden = [
        'password',
    ];

    /**
     * {@inheritdoc}
     */
    protected $casts = [
        'password' => 'hashed',
    ];
}
