<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin as Actions;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin as Requests;
use Illuminate\Http\JsonResponse;

class RegisterController extends Controller
{
    /**
     * Register admin.
     */
    public function register(
        Requests\RegisterRequest $request,
        Actions\RegisterAction $action,
    ): JsonResponse {

        $channel = $action->execute($request->passed());

        return $this->success([
            'message' => __('registered_successfully'),
            'token' => $channel->stringToken(),
            'resource' => $channel->account(),
        ]);
    }
}
