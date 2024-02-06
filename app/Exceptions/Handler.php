<?php

namespace App\Exceptions;

use App\Traits\ApiResponse;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Exceptions\PostTooLargeException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Throwable;

class Handler extends ExceptionHandler
{
    use ApiResponse;

    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * {@inheritDoc}
     */
    public function render($request, Throwable $e): JsonResponse
    {
        switch (true) {
            case $e instanceof RouteNotFoundException:
            case $e instanceof NotFoundHttpException:
            case $e instanceof ModelNotFoundException:
                return $this->notFound([], __('message.exception.404'));

            case $e instanceof PostTooLargeException:
                return $this->error([], __('message.exception.413'), 413);

            case $e instanceof AuthenticationException:
            case $e instanceof AuthorizationException:
                return $this->unauthorized([], $e->getMessage());

            case $e instanceof ValidationException:
                return $this->unprocessable($e->errors(), $e->getMessage());

            case $e instanceof HttpException:
                return $this->error([], __('message.exception.403'), 403);
            default:
                return parent::render($request, $e);
        }
    }
}
