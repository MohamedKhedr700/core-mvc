<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin as Actions;
use App\Http\Requests\Admin as Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class LoginController extends Controller
{
    /**
     * Login admin.
     */
    public function login(
        Requests\LoginRequest $request,
        Actions\LoginAction $action,
    ): JsonResponse
    {
        $channel = $action->execute($request->passed());

        return $this->success([
            'token' => $channel->stringToken(),
            'resource' => $channel->account(),
        ]);
    }

    /**
     * Logout admin.
     */
    public function logout(
        Actions\LogoutAction $action,
    ): JsonResponse
    {
        $action->execute();

        return $this->message(__('logout_successfully'));
    }
}
