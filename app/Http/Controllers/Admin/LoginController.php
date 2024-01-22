<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\LoginAdminAction;
use App\Actions\Admin\LogoutAdminAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginAdminRequest;
use Illuminate\Http\JsonResponse;

class LoginController extends Controller
{
    /**
     * Login admin.
     */
    public function login(LoginAdminRequest $request, LoginAdminAction $loginAdminAction): JsonResponse
    {
        $channel = $loginAdminAction->execute($request->passed());

        return $this->success([
            'token' => $channel->stringToken(),
            'resource' => $channel->account(),
        ]);
    }

    /**
     * Logout admin.
     */
    public function logout(LogoutAdminAction $logoutAdminAction): JsonResponse
    {
        $logoutAdminAction->execute();

        return $this->message(__('logout_successfully'));
    }
}
