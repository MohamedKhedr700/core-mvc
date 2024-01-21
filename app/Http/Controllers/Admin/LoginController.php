<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\LoginAdminAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginAdminRequest;
use Illuminate\Http\JsonResponse;

class LoginController extends Controller
{
    /**
     * Invoke the controller method.
     */
    public function __invoke(LoginAdminRequest $request, LoginAdminAction $loginAdminAction): JsonResponse
    {
        $channel = $loginAdminAction->execute($request->passed());

        return response()->json([
            'token' => $channel->stringToken(),
            'resource' => $channel->account(),
        ]);
    }
}
