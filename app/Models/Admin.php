<?php

namespace App\Models;

use App\Enums\Account as AccountEnum;
use App\Events\Admin\ForgotPasswordEvent;
use App\Http\Gates\Admin\AdminGate;
use App\Models\ModelFilters\AdminFilter;
use App\Traits\Models\CanForgotPassword;
use Database\Factories\AdminFactory;
use Illuminate\Contracts\Auth\CanResetPassword;
use Raid\Core\Auth\Authentication\Contracts\AuthenticatableInterface;
use Raid\Core\Auth\Models\Authentication\Account;
use Raid\Core\Auth\Traits\Model\Authenticatable;
use Raid\Core\Event\Traits\Event\Eventable;
use Raid\Core\Gate\Traits\Gate\Gateable;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Account implements AuthenticatableInterface, CanResetPassword
{
    use Authenticatable;
    use CanForgotPassword;
    use Eventable;
    use Gateable;
    use HasRoles;

    /**
     * {@inheritdoc}
     */
    public const ACCOUNT_TYPE = AccountEnum::ADMIN;

    /**
     * {@inheritdoc}
     */
    protected static string $factory = AdminFactory::class;

    /**
     * {@inheritdoc}
     */
    protected string $filter = AdminFilter::class;

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
    public static function getEvents(): array
    {
        return [
            ForgotPasswordEvent::class,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function getGates(): array
    {
        return [
            AdminGate::class,
        ];
    }
}
