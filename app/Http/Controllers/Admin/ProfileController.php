<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin as Actions;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin as Requests;
use Illuminate\Http\JsonResponse;

class ProfileController extends Controller
{
    /**
     * Get admin profile.
     */
    public function get(
        Actions\FindProfileAction $action,
    ): JsonResponse {

        return $this->resource($action->execute());
    }

    /**
     * Update admin profile.
     */
    public function update(
        Requests\UpdateProfileRequest $request,
        Actions\UpdateProfileAction $action,
    ): JsonResponse {

        $action->execute($request->passed());

        return $this->message(__('profile_updated_successfully'));
    }

    /**
     * Logout admin.
     */
    public function logout(
        Actions\LogoutAction $action,
    ): JsonResponse {

        $action->execute();

        return $this->message(__('profile_logout_successfully'));
    }
}
