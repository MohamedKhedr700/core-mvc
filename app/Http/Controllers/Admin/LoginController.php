<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin as Actions;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin as Requests;
use App\Http\Transformers\Admin\AdminTransformer;
use Illuminate\Http\JsonResponse;
use Raid\Core\Auth\Authentication\Contracts\AuthChannelInterface;

class LoginController extends Controller
{
    /**
     * Login an admin.
     */
    public function login(
        Requests\LoginRequest $request,
        Actions\LoginAction $action,
    ): JsonResponse {

        $channel = $action->execute($request->passed());

        return $channel->errors()->any() ?
            $this->failedLogin($channel) :
            $this->successLogin($channel);
    }

    /**
     * Success login response.
     */
    private function successLogin(AuthChannelInterface $channel): JsonResponse
    {
        return $this->success([
            'message' => __('logged_in_successfully'),
            'token' => $channel->stringToken(),
            'resource' => fractal_data($channel->account(), new AdminTransformer),
        ]);
    }

    /**
     * Failed login response.
     */
    private function failedLogin(AuthChannelInterface $channel): JsonResponse
    {
        return $this->unprocessable($channel->errors()->toArray());
    }
}
