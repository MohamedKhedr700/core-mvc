<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\FindAdminProfileAction;
use App\Actions\Admin\UpdateAdminProfileAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateAdminProfileRequest;
use Illuminate\Http\JsonResponse;

class ProfileController extends Controller
{
    /**
     * Get admin profile.
     */
    public function get(FindAdminProfileAction $findAdminProfileAction): JsonResponse
    {
        return $this->successResource($findAdminProfileAction->execute());
    }

    /**
     * Update admin profile.
     */
    public function update(UpdateAdminProfileRequest $request, UpdateAdminProfileAction $updateAdminProfileAction): JsonResponse
    {
        $updateAdminProfileAction->execute($request->passed());

        return $this->success(__('profile_updated_successfully'));
    }
}
