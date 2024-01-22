<?php

namespace App\Actions\Admin;

use App\Models\Admin;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Raid\Core\Action\Actions\Contracts\Crud\ListActionInterface;
use Raid\Core\Action\Actions\Crud\ListAction as RaidListAction;
use Raid\Core\Action\Exceptions\Actionable\InvalidActionableException;

class ListAction extends RaidListAction implements ListActionInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTIONABLE = Admin::class;

    /**
     * {@inheritdoc}
     */
    public function handle(array $filters = [], array $columns = ['*'], array $relations = [], bool $paginate = false): Collection|LengthAwarePaginator
    {
        return $paginate ? $this->paginate($filters, $columns, $relations) : $this->all($filters, $columns, $relations);
    }

    /**
     * {@inheritdoc}
     */
    public function all(array $filters = [], array $columns = ['*'], array $relations = []): Collection
    {
        return $this->index($filters, $columns, $relations)->get();
    }

    /**
     * {@inheritdoc}
     */
    public function paginate(array $filters = [], array $columns = ['*'], array $relations = []): LengthAwarePaginator
    {
        return $this->index($filters, $columns, $relations)->paginate();
    }

    /**
     * @throws InvalidActionableException
     */
    private function index(array $filters = [], array $columns = ['*'], array $relations = [])
    {
        return $this->actionable()
            ->filter($filters)
            ->select($columns)
            ->with($relations);
    }
}
