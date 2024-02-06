<?php

namespace App\Models\ModelFilters;

use Raid\Core\Model\Models\Filter\ModelFilter;

class RoleFilter extends ModelFilter
{
    /**
     * Filter with names.
     */
    protected function names(array $names): self
    {
        return $this->whereIn('name', $names);
    }
}
