<?php

namespace App\Traits\Requests;

trait WithPaginationRules
{
    /**
     * Get pagination rules merged with custom rules.
     */
    public function withPaginationRules(array $rules = []): array
    {
        return array_merge_recursive($rules, $this->paginationRules());
    }

    /**
     * Define pagination rules.
     */
    public function paginationRules(): array
    {
        return [
            'page' => ['nullable', 'int', 'min:1'],
            'perPage' => ['nullable', 'int', 'min:1'],
        ];
    }
}
