<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin as Actions;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin as Requests;
use Illuminate\Http\JsonResponse;

class ForgotPasswordController extends Controller
{
    /**
     * Send admin forgot password.
     */
    public function send(
        Requests\SendForgotPasswordRequest $request,
        Actions\SendForgotPasswordAction $action,
    ): JsonResponse {

        $action->execute($request->passed());

        return $this->message(__('forgot_password_successfully'));
    }

    /**
     * Reset admin password.
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
