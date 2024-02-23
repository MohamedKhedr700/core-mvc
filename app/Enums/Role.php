<?php

namespace App\Enums;

use Raid\Core\Enum\Enums\Enum;

class Role extends Enum
{
    const NONE = 'none';

    const MANAGEMENT = 'management';

    const ADMINISTRATOR = 'administrator';

    const ASSISTANT = 'assistant';
}
