<?php

use App\Http\Controllers\Permission;
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

// crud routes
Route::prefix('v1/admin/permissions')
    ->middleware(['auth:admin'])
    ->group(function () {
        Route::post('/', [Permission\CrudController::class, 'store']);
        Route::get('/', [Permission\CrudController::class, 'index']);
        Route::get('/{permission}', [Permission\CrudController::class, 'show']);
        Route::put('/{permission}', [Permission\CrudController::class, 'update']);
        Route::delete('/{permission}', [Permission\CrudController::class, 'delete']);
    });
