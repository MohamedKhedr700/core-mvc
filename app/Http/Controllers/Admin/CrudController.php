<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin as Actions;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin as Requests;
use App\Http\Transformers\Admin\AdminTransformer;
use App\Models\Admin as AdminModel;
use Illuminate\Http\JsonResponse;

class CrudController extends Controller
{
    /**
     * Create a new admin.
     */
    public function store(
        Requests\StoreRequest $request,
        Actions\CreateAction $action,
    ): JsonResponse {

        $action->execute($request->passed());

        return $this->message(__('created_successfully'));
    }

    /**
     * List admin resources.
     */
    public function index(
        Requests\ListRequest $request,
        Actions\ListAction $action,
    ): JsonResponse {

        $resources = $action->execute($request->passed());

        return $this->resources(fractal_data($resources, new AdminTransformer));
    }

    /**
     * Show an admin.
     */
    public function show(
        AdminModel $admin,
        Actions\FindAction $action,
    ): JsonResponse {

        $resource = $action->execute($admin);

        return $this->resource(fractal_data($resource, new AdminTransformer));
    }

    /**
     * Update an admin.
     */
    public function update(
        Requests\UpdateRequest $request,
        AdminModel $admin,
        Actions\UpdateAction $action,
    ): JsonResponse {

        $action->execute($admin, $request->passed());

        return $this->message(__('updated_successfully'));
    }

    /**
     * Delete an admin.
     */
    public function delete(
        AdminModel $admin,
        Actions\DeleteAction $action,
    ): JsonResponse {

        $action->execute($admin);

        return $this->message(__('deleted_successfully'));
    }
}
