<?php

namespace App\Actions\Product;

use App\Actions\Core\ListAction as CoreListAction;
use App\Models\Product;
use App\Traits\Actions\WithCache;
use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Raid\Core\Action\Actions\Contracts\Crud\ListActionInterface;

class ListAction extends CoreListAction implements ListActionInterface
{
    use WithCache;

    /**
     * {@inheritdoc}
     */
    public const ACTIONABLE = Product::class;

    /**
     * {@inheritdoc}
     *
     * @throws Exception
     */
    public function handle(array $filters = [], array $columns = ['*'], array $relations = []): Collection|LengthAwarePaginator
    {
        if (
            $this->cached(
                $filters,
                $columns,
                $relations,
            )) {
            return $this->getCached(
                $filters,
                $columns,
                $relations,
            );
        }

        $result = parent::handle(
            $filters,
            $columns,
            $relations,
        );

        return $this->cache(
            $result,
            $filters,
            $columns,
            $relations,
        );
    }
}
