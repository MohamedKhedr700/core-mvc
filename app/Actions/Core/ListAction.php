<?php

namespace App\Actions\Core;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Raid\Core\Action\Actions\Contracts\Crud\ListActionInterface;
use Raid\Core\Action\Actions\Crud\ListAction as RaidListAction;
use Raid\Core\Action\Exceptions\Actionable\InvalidActionableException;

abstract class ListAction extends RaidListAction implements ListActionInterface
{
    /**
     * {@inheritdoc}
     */
    public function handle(array $filters = [], array $columns = ['*'], array $relations = [], bool $paginate = false): Collection|LengthAwarePaginator
    {
        return array_key_exists('perPage', $filters) ?
            $this->paginate($filters, $columns, $relations) :
            $this->all($filters, $columns, $relations);
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
        return $this->index($filters, $columns, $relations)->paginate($filters['perPage'], $filters['page'] ?? 0);
    }

    /**
     * Index actionable instance.
     *
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
