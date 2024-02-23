<?php

namespace App\Events\User;

use App\Actions\User\SendForgotPasswordAction;
use App\Listeners\User\SendForgotPasswordListener;
use Raid\Core\Event\Events\Contracts\EventInterface;
use Raid\Core\Event\Events\Event;

class ForgotPasswordEvent extends Event implements EventInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTION = SendForgotPasswordAction::ACTION;

    /**
     * {@inheritdoc}
     */
    public const LISTENERS = [
        SendForgotPasswordListener::class,
    ];
}
