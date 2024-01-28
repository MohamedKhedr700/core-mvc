<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin as Actions;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin as Requests;
use App\Models\Admin as AdminModel;
use Illuminate\Http\JsonResponse;

class AdminController extends Controller
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

        return $this->resources($action->execute($request->passed()));
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
     * Show an admin.
     */
    public function show(
        AdminModel $admin,
        Actions\FindAction $action,
    ): JsonResponse {

        return $this->resource($action->execute($admin));
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
