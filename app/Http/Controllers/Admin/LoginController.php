<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\Auth as Actions;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin as Requests;
use Illuminate\Http\JsonResponse;

class LoginController extends Controller
{
    /**
     * Login admin.
     */
    public function login(
        Requests\LoginRequest    $request,
        Actions\LoginAction $action,
    ): JsonResponse {
        $channel = $action->execute($request->passed());

        return $this->success([
            'token' => $channel->stringToken(),
            'resource' => $channel->account(),
        ]);
    }
}
