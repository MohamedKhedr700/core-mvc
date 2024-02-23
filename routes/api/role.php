<?php

use App\Http\Controllers\Role;
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
Route::prefix('v1/admin/roles')
    ->middleware(['auth:admin'])
    ->group(function () {
        Route::post('/', [Role\CrudController::class, 'store']);
        Route::get('/', [Role\CrudController::class, 'index']);
        Route::get('/{id}', [Role\CrudController::class, 'show']);
        Route::put('/{id}', [Role\CrudController::class, 'update']);
        Route::delete('/{id}', [Role\CrudController::class, 'delete']);
    });
