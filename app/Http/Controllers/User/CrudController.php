<?php

namespace App\Http\Controllers\User;

use App\Actions\User as Actions;
use App\Http\Controllers\Controller;
use App\Http\Requests\User as Requests;
use App\Http\Transformers\User\UserTransformer;
use App\Models\User as UserModel;
use Illuminate\Http\JsonResponse;

class CrudController extends Controller
{
    /**
     * Create a user resource.
     */
    public function store(
        Requests\StoreRequest $request,
        Actions\CreateAction $action,
    ): JsonResponse {

        $action->execute($request->passed());

        return $this->message(__('created_successfully'));
    }

    /**
     * List user resources.
     */
    public function index(
        Requests\ListRequest $request,
        Actions\ListAction $action,
    ): JsonResponse {

        $resources = $action->execute($request->passed());

        return $this->resources(fractal_data($resources, new UserTransformer));
    }

    /**
     * Show a user resource.
     */
    public function show(
        UserModel $user,
        Actions\FindAction $action,
    ): JsonResponse {

        $resource = $action->execute($user);

        return $this->resource(fractal_data($resource, new UserTransformer));
    }

    /**
     * Update a user resource.
     */
    public function update(
        Requests\UpdateRequest $request,
        UserModel $user,
        Actions\UpdateAction $action,
    ): JsonResponse {

        $action->execute($user, $request->passed());

        return $this->message(__('updated_successfully'));
    }

    /**
     * Delete a user resource.
     */
    public function delete(
        UserModel $user,
        Actions\DeleteAction $action,
    ): JsonResponse {

        $action->execute($user);

        return $this->message(__('deleted_successfully'));
    }
}
