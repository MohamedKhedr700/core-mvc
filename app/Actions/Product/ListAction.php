<?php

namespace App\Actions\Product;

use App\Actions\Core\CacheAction;
use App\Actions\Core\ListAction as CoreListAction;
use App\Models\Product;
use App\Traits\Actions\WithCache;
use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;
use Raid\Core\Action\Actions\Contracts\Crud\ListActionInterface;

class ListAction extends CoreListAction implements ListActionInterface
{
    use WithCache;

    /**
     * {@inheritdoc}
     */
    public const ACTIONABLE = Product::class;

    /**
     * Create a new instance.
     */
    public function __construct(
        private readonly CacheAction $cacheAction,
    ) {
        $this->cacheAction->setAction($this);
    }

    /**
     * {@inheritdoc}
     *
     * @throws Exception
     */
    public function handle(array $filters = [], array $columns = ['*'], array $relations = []): Collection|LengthAwarePaginator
    {
        return $this->cacheAction->exists($filters, $columns, $relations) ?
            $this->cacheAction->cached($filters, $columns, $relations) :
            $this->cacheAction->remember(
                parent::handle($filters, $columns, $relations),
                $filters,
                $columns,
                $relations,
            );
    }
}
