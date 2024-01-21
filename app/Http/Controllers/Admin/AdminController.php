<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\CreateAdminAction;
use App\Actions\Admin\DeleteAdminAction;
use App\Actions\Admin\FindAdminAction;
use App\Actions\Admin\ListAdminAction;
use App\Actions\Admin\UpdateAdminAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ListAdminRequest;
use App\Http\Requests\Admin\StoreAdminRequest;
use App\Http\Requests\Admin\UpdateAdminRequest;
use App\Models\Admin;
use Illuminate\Http\JsonResponse;

class AdminController extends Controller
{
    /**
     * Create a new admin.
     */
    public function store(StoreAdminRequest $request, CreateAdminAction $createAdminAction): JsonResponse
    {
        $createAdminAction->execute($request->passed());

        return response()->json([
            'message' => __('created_successfully'),
        ]);
    }

    /**
     * List admins.
     */
    public function index(ListAdminRequest $request, ListAdminAction $listAdminAction): JsonResponse
    {
        $admins = $listAdminAction->execute($request->passed());

        return response()->json([
            'resources' => $admins,
        ]);
    }

    /**
     * Update an admin.
     */
    public function update(UpdateAdminRequest $request, Admin $admin, UpdateAdminAction $updateAdminAction): JsonResponse
    {
        $updateAdminAction->execute($admin, $request->passed());

        return response()->json([
            'message' => __('updated_successfully'),
        ]);
    }

    /**
     * Show an admin.
     */
    public function show(Admin $admin, FindAdminAction $findAdminAction): JsonResponse
    {
        $findAdminAction->execute($admin);

        return response()->json([
            'message' => '',
            'resource' => $admin,
        ]);
    }

    /**
     * Delete an admin.
     */
    public function delete(Admin $admin, DeleteAdminAction $deleteAdminAction): JsonResponse
    {
        $deleteAdminAction->execute($admin);

        return response()->json([
            'message' => __('deleted_successfully'),
        ]);
    }
}
