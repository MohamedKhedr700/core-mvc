<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin as Actions;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin as Requests;
use App\Http\Transformers\Admin\AdminTransformer;
use Illuminate\Http\JsonResponse;

class ProfileController extends Controller
{
    /**
     * Get an admin profile.
     */
    public function get(
        Actions\FindProfileAction $action,
    ): JsonResponse {

        $resource = $action->execute();

        return $this->resource(fractal_data($resource, new AdminTransformer));
    }

    /**
     * Update an admin profile.
     */
    public function update(
        Requests\UpdateProfileRequest $request,
        Actions\UpdateProfileAction $action,
    ): JsonResponse {

        $action->execute($request->passed());

        return $this->message(__('profile_updated_successfully'));
    }

    /**
     * Logout an admin.
     */
    public function logout(
        Actions\LogoutAction $action,
    ): JsonResponse {

        $action->execute();

        return $this->message(__('profile_logout_successfully'));
    }
}
