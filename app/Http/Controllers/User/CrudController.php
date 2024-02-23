<?php

namespace App\Http\Controllers\User;

use App\Actions\User as Actions;
use App\Http\Controllers\Controller;
use App\Http\Requests\User as Requests;
use App\Http\Transformers\User\UserTransformer as Transformer;
use App\Models\User as Model;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;

class CrudController extends Controller
{
    /**
     * Create a user resource.
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
     * List user resources.
     *
     * @throws AuthorizationException
     */
    public function index(
        Requests\ListRequest $request,
        Actions\ListAction $action,
    ): JsonResponse {

        $action->authorize();

        $resources = $action->execute($request->passed());

        return $this->resources(
            fractal_data($resources, new Transformer));
    }

    /**
     * Show a user resource.
     *
     * @throws AuthorizationException
     */
    public function show(
        Model $model,
        Actions\FindAction $action,
    ): JsonResponse {

        $action->authorize();

        $resource = $action->execute($model);

        return $this->resource(fractal_data($resource, new Transformer));
    }

    /**
     * Update a user resource.
     *
     * @throws AuthorizationException
     */
    public function update(
        Requests\UpdateRequest $request,
        Model $model,
        Actions\UpdateAction $action,
    ): JsonResponse {

        $action->authorize();

        $action->execute($model, $request->passed());

        return $this->message(__('updated_successfully'));
    }

    /**
     * Delete a user resource.
     *
     * @throws AuthorizationException
     */
    public function delete(
        Model $model,
        Actions\DeleteAction $action,
    ): JsonResponse {

        $action->authorize();

        $action->execute($model);

        return $this->message(__('deleted_successfully'));
    }
}
