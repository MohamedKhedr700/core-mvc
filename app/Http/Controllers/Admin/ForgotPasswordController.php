<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\ForgotPassword as Actions;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin as Requests;
use Illuminate\Http\JsonResponse;

class ForgotPasswordController extends Controller
{
    /**
     * Send admin forgot password.
     */
    public function send(
        Requests\SendForgotPasswordRequest              $request,
        Actions\SendForgotPasswordAction $action,
    ): JsonResponse {
        $action->execute($request->passed());

        return $this->message(__('forgot_password_successfully'));
    }

    /**
     * Verify admin forgot password.
     */
    public function verify(
        Requests\VerifyForgotPasswordRequest $request,
    ): JsonResponse {

        return $this->message(__('verify_forgot_password_successfully'));
    }

    /**
     * Reset admin password.
     */
    public function reset(
        Requests\ResetForgotPasswordRequest $request,
    ): JsonResponse {

        return $this->message(__('reset_forgot_password_successfully'));
    }
}
