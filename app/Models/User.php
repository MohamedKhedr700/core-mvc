<?php

namespace App\Models;

use App\Enums\Account as AccountEnum;
use App\Traits\Models\CanForgotPassword;
use Illuminate\Contracts\Auth\CanResetPassword;
use Raid\Core\Auth\Authentication\Contracts\AuthenticatableInterface;
use Raid\Core\Auth\Models\Authentication\Account;
use Raid\Core\Auth\Traits\Model\Authenticatable;
use Raid\Core\Event\Traits\Event\Eventable;

class User extends Account implements AuthenticatableInterface, CanResetPassword
{
    use Authenticatable;
    use CanForgotPassword;
    use Eventable;

    /**
     * {@inheritdoc}
     */
    public const ACCOUNT_TYPE = AccountEnum::USER;

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
