<?php

namespace App\Models;

use App\Enums\Account as AccountEnum;
use App\Events\User\SendForgotPasswordEvent;
use App\Models\ModelFilters\UserFilter;
use App\Traits\Models\CanForgotPassword;
use Database\Factories\UserFactory;
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
    protected static string $factory = UserFactory::class;

    /**
     * {@inheritdoc}
     */
    protected string $filter = UserFilter::class;

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

    /**
     * {@inheritdoc}
     */
    public static function getEvents(): array
    {
        return [
            SendForgotPasswordEvent::class,
        ];
    }
}
