<?php

use App\Http\Controllers\Product;
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
Route::prefix('v1/admin/products')
    ->middleware(['auth:admin'])
    ->group(function () {
        Route::post('/', [Product\CrudController::class, 'store']);
        Route::get('/', [Product\CrudController::class, 'index']);
        Route::get('/{id}', [Product\CrudController::class, 'show']);
        Route::put('/{id}', [Product\CrudController::class, 'update']);
        Route::delete('/{id}', [Product\CrudController::class, 'delete']);
    });

// user product routes
Route::prefix('v1/user/products')
    ->middleware(['auth:user'])
    ->group(function () {
        Route::get('/', [Product\ProductController::class, 'index']);
        Route::get('/{id}', [Product\ProductController::class, 'show']);
    });
