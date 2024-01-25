<?php

namespace App\Http\Middleware;

use App\Actions\Core\VerifyApiAction;
use App\Traits\ApiResponse;
use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Validation\UnauthorizedException;
use Symfony\Component\HttpFoundation\Response;

class VerifyApi
{
    use ApiResponse;

    /**
     * Handle an incoming request.
     *
     * @throws AuthenticationException
     */
    public function handle(Request $request, Closure $next): Response
    {
        $apiKey = config('app.api_key');

        $requestApiKey = $request->header('x-api-key');

        switch (true) {
            case ! $apiKey || ! $requestApiKey:
            case $apiKey !== $requestApiKey:

            throw new AuthenticationException();
        }

        return $next($request);
    }
}
