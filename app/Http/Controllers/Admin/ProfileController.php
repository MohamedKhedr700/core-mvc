<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin as Actions;
use App\Http\Requests\Admin as Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class ProfileController extends Controller
{
    /**
     * Get admin profile.
     */
    public function get(
        Actions\FindProfileAction $action,
    ): JsonResponse
    {
        return $this->resource($action->execute());
    }

    /**
     * Update admin profile.
     */
    public function update(
        Requests\UpdateProfileRequest $request,
        Actions\UpdateProfileAction $action,
    ): JsonResponse
    {
        $action->execute($request->passed());

        return $this->message(__('profile_updated_successfully'));
    }
}
