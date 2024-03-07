<?php

namespace App\Models\ModelFilters;

use Raid\Core\Model\Models\Filter\ModelFilter;

class ProductFilter extends ModelFilter
{
    /**
     * Filter with name.
     */
    protected function name(string $name): self
    {
        return $this->whereLike('name', $name);
    }
}
