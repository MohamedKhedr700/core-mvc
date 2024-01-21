<?php

namespace App\Models;

use App\Models\ModelFilters\AdminFilter;
use Raid\Core\Auth\Authentication\Contracts\AuthenticatableInterface;
use Raid\Core\Auth\Models\Authentication\Account;
use Raid\Core\Auth\Traits\Model\Authenticatable;

class Admin extends Account implements AuthenticatableInterface
{
    use Authenticatable;

    /**
     * {@inheritdoc}
     */
    public const ACCOUNT_TYPE = 'admin';

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
}
