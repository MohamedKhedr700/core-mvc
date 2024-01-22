<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ProfileController;
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

// profile routes
Route::prefix('v1/admin/admins/profile')
    ->middleware(['auth:admin'])
    ->group(function () {
        Route::post('/', [ProfileController::class, 'update']);
        Route::get('/', [ProfileController::class, 'get']);
        Route::get('logout', [LoginController::class, 'logout']);
    });

// auth routes
Route::prefix('v1/admin/admins')
    ->group(function () {
        Route::post('login', [LoginController::class, 'login']);
    });

// crud routes
Route::prefix('v1/admin/admins')
    ->middleware(['auth:admin'])
    ->group(function () {
        Route::post('/', [AdminController::class, 'store']);
        Route::get('/', [AdminController::class, 'index']);
        Route::get('{admin}', [AdminController::class, 'show']);
        Route::put('{admin}', [AdminController::class, 'update']);
        Route::delete('{admin}', [AdminController::class, 'delete']);
    });
