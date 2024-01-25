<?php

use App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Route;

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

// auth routes
Route::prefix('v1/admin/admins')
    ->group(function () {
        Route::post('login', [Admin\LoginController::class, 'login']);
        Route::post('register', [Admin\RegisterController::class, 'register'])
            ->middleware(['verify.api']);
    });

// profile routes
Route::prefix('v1/admin/admins/profile')
    ->middleware(['auth:admin'])
    ->group(function () {
        Route::post('/', [Admin\ProfileController::class, 'update']);
        Route::get('/', [Admin\ProfileController::class, 'get']);
        Route::get('logout', [Admin\ProfileController::class, 'logout']);
    });

// forgot password routes
Route::prefix('v1/admin/admins/forgot-password')
    ->group(function () {
        Route::post('/send', [Admin\ForgotPasswordController::class, 'send']);
        Route::post('/reset', [Admin\ForgotPasswordController::class, 'reset'])
            ->name('admin.reset.forgot.password');
    });

// crud routes
Route::prefix('v1/admin/admins')
    ->middleware(['auth:admin'])
    ->group(function () {
        Route::post('/', [Admin\AdminController::class, 'store']);
        Route::get('/', [Admin\AdminController::class, 'index']);
        Route::get('{admin}', [Admin\AdminController::class, 'show']);
        Route::put('{admin}', [Admin\AdminController::class, 'update']);
        Route::delete('{admin}', [Admin\AdminController::class, 'delete']);
    });
