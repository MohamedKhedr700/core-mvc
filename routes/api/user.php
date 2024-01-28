<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

use App\Http\Controllers\User;
use Illuminate\Support\Facades\Route;

// auth routes
Route::prefix('v1/user/users')
    ->group(function () {
        Route::post('login', [User\LoginController::class, 'login']);
        Route::post('register', [User\RegisterController::class, 'register']);
    });

// profile routes
Route::prefix('v1/user/users/profile')
    ->middleware(['auth:user'])
    ->group(function () {
        Route::post('/', [User\ProfileController::class, 'update']);
        Route::get('/', [User\ProfileController::class, 'get']);
        Route::get('logout', [User\ProfileController::class, 'logout']);
    });

// forgot password routes
Route::prefix('v1/user/users/forgot-password')
    ->group(function () {
        Route::post('/send', [User\ForgotPasswordController::class, 'send']);
        Route::post('/reset', [User\ForgotPasswordController::class, 'reset'])
            ->name('user.reset.forgot.password');
    });

// crud routes
Route::prefix('v1/user/users')
    ->middleware(['auth:admin'])
    ->group(function () {
        Route::post('/', [User\UserController::class, 'store']);
        Route::get('/', [User\UserController::class, 'index']);
        Route::get('/{user}', [User\UserController::class, 'show']);
        Route::put('/{user}', [User\UserController::class, 'update']);
        Route::delete('/{user}', [User\UserController::class, 'delete']);
    });
