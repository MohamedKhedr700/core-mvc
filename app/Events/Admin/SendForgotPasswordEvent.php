<?php

namespace App\Events\Admin;

use App\Actions\Admin\SendForgotPasswordAction;
use App\Listeners\Admin\SendForgotPasswordListener;
use Raid\Core\Event\Events\Contracts\EventInterface;
use Raid\Core\Event\Events\Event;

class SendForgotPasswordEvent extends Event implements EventInterface
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
