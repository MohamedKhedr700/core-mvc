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

// crud routes
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1/user/users')
    ->middleware(['auth:admin'])
    ->group(function() {
        Route::post('/', [UserController::class, 'store']);
        Route::get('/', [UserController::class, 'index']);
        Route::get('/{user}', [UserController::class, 'show']);
        Route::put('/{user}', [UserController::class, 'update']);
        Route::delete('/{user}', [UserController::class, 'delete']);
    });
