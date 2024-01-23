<?php

namespace App\Models\ModelFilters;

use Raid\Core\Model\Models\Filter\ModelFilter;

class AdminFilter extends ModelFilter
{
    /**
     * Filter with email.
     */
    protected function email(string $email): self
    {
        return $this->where('email', $email);
    }
}
