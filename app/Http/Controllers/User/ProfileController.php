<?php

namespace App\Http\Controllers\User;

use App\Actions\User as Actions;
use App\Http\Controllers\Controller;
use App\Http\Requests\User as Requests;
use App\Http\Transformers\User\UserTransformer as Transformer;
use Illuminate\Http\JsonResponse;

class ProfileController extends Controller
{
    /**
     * Get a user profile.
     */
    public function get(
        Actions\FindProfileAction $action,
    ): JsonResponse {

        $resource = $action->execute();

        return $this->resource(fractal_data($resource, new Transformer));
    }

    /**
     * Update a user profile.
     */
    public function update(
        Requests\UpdateProfileRequest $request,
        Actions\UpdateProfileAction $action,
    ): JsonResponse {

        $action->execute($request->passed());

        return $this->message(__('profile_updated_successfully'));
    }

    /**
     * Logout a user.
     */
    public function logout(
        Actions\LogoutAction $action,
    ): JsonResponse {

        $action->execute();

        return $this->message(__('profile_logout_successfully'));
    }
}
