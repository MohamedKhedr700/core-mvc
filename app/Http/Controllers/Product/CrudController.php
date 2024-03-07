<?php

namespace App\Http\Controllers\Product;

use App\Actions\Product as Actions;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product as Requests;
use App\Http\Transformers\Product\ProductTransformer as Transformer;
use App\Models\Product as Model;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;

class CrudController extends Controller
{
    /**
     * Create a new product.
     *
     * @throws AuthorizationException
     */
    public function store(
        Requests\StoreRequest $request,
        Actions\CreateAction $action,
    ): JsonResponse {

        $action->authorize();

        $action->execute($request->passed());

        return $this->message(__('created_successfully'));
    }

    /**
     * List product resources.
     *
     * @throws AuthorizationException
     */
    public function index(
        Requests\ListRequest $request,
        Actions\ListAction $action,
    ): JsonResponse {

        $action->authorize();

        $resources = $action->execute(
            $request->passed(),
            ['*'],
            ['users'],
        );

        return $this->resources(fractal_data($resources, new Transformer, ['admin']));
    }

    /**
     * Show a product.
     *
     * @throws AuthorizationException
     */
    public function show(
        Model $id,
        Actions\FindAction $action,
    ): JsonResponse {

        $action->authorize();

        $resource = $action->execute($id);

        return $this->resource(fractal_data($resource, new Transformer));
    }

    /**
     * Update a product.
     *
     * @throws AuthorizationException
     */
    public function update(
        Requests\UpdateRequest $request,
        Model $id,
        Actions\UpdateAction $action,
    ): JsonResponse {

        $action->authorize();

        $action->execute($id, $request->passed());

        return $this->message(__('updated_successfully'));
    }

    /**
     * Delete a product.
     *
     * @throws AuthorizationException
     */
    public function delete(
        Model $id,
        Actions\DeleteAction $action,
    ): JsonResponse {

        $action->authorize();

        $action->execute($id);

        return $this->message(__('deleted_successfully'));
    }
}
