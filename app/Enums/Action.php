<?php

namespace App\Enums;

use Raid\Core\Enum\Enums\Action as RaidAction;

class Action extends RaidAction
{
    public const SEND_FORGOT_PASSWORD = 'send_forgot_password';

    public const RESET_FORGOT_PASSWORD = 'reset_forgot_password';
}
