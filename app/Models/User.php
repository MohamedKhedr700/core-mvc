<?php

namespace App\Models;

use App\Enums\Account as AccountEnum;
use App\Events\User\SendForgotPasswordEvent;
use App\Http\Gates\User\UserGate;
use App\Models\ModelFilters\UserFilter;
use App\Traits\Models\CanForgotPassword;
use Database\Factories\UserFactory;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Raid\Core\Auth\Authentication\Contracts\AuthenticatableInterface;
use Raid\Core\Auth\Models\Authentication\Account;
use Raid\Core\Auth\Traits\Model\Authenticatable;
use Raid\Core\Event\Traits\Event\Eventable;
use Raid\Core\Gate\Traits\Gate\Gateable;

class User extends Account implements AuthenticatableInterface, CanResetPassword
{
    use Authenticatable;
    use CanForgotPassword;
    use Eventable;
    use Gateable;

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

    /**
     * {@inheritdoc}
     */
    public static function getGates(): array
    {
        return [
            UserGate::class,
        ];
    }

    /**
     * Get products that belong to user wishlist.
     */
    public function wishlist(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, Wishlist::class);
    }
}
