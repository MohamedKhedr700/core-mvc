<?php

namespace App\Http\Controllers\User;

use App\Actions\User as Actions;
use App\Http\Controllers\Controller;
use App\Http\Requests\User as Requests;
use App\Http\Transformers\User\UserTransformer as Transformer;
use Illuminate\Http\JsonResponse;
use Raid\Core\Auth\Authentication\Contracts\AuthChannelInterface;

class RegisterController extends Controller
{
    /**
     * Register a user.
     */
    public function register(
        Requests\RegisterRequest $request,
        Actions\RegisterAction $action,
    ): JsonResponse {

        $channel = $action->execute($request->passed());

        return $channel->errors()->any() ?
            $this->failedRegister($channel) :
            $this->successRegister($channel);
    }

    /**
     * Success register response.
     */
    private function successRegister(AuthChannelInterface $channel): JsonResponse
    {
        return $this->success([
            'message' => __('registered_successfully'),
            'token' => $channel->stringToken(),
            'resource' => fractal_data($channel->account(), new Transformer),
        ]);
    }

    /**
     * Failed register response.
     */
    private function failedRegister(AuthChannelInterface $channel): JsonResponse
    {
        return $this->unprocessable($channel->errors()->toArray());
    }
}
