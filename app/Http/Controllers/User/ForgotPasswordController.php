<?php

namespace App\Http\Controllers\User;

use App\Actions\User as Actions;
use App\Http\Controllers\Controller;
use App\Http\Requests\User as Requests;
use Illuminate\Http\JsonResponse;

class ForgotPasswordController extends Controller
{
    /**
     * Send a user forgot password.
     */
    public function send(
        Requests\SendForgotPasswordRequest $request,
        Actions\SendForgotPasswordAction $action,
    ): JsonResponse {

        $action->execute($request->passed());

        return $this->message(__('forgot_password_successfully'));
    }

    /**
     * Reset a user password.
     */
    public function reset(
        Requests\ResetForgotPasswordRequest $request,
        Actions\ResetForgotPasswordAction $action
    ): JsonResponse {

        $valid = $action->execute($request->passed());

        return $valid ?
            $this->message(__('reset_forgot_password_successfully')) :
            $this->unprocessable([], 'reset_forgot_password_failed');
    }
}
