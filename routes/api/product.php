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
        Route::post('/', [Product\ProductController::class, 'store']);
        Route::get('/', [Product\ProductController::class, 'index']);
        Route::get('{product}', [Product\ProductController::class, 'show']);
        Route::put('{product}', [Product\ProductController::class, 'update']);
        Route::delete('{product}', [Product\ProductController::class, 'delete']);
    });
