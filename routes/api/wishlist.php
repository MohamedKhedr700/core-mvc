<?php

use App\Http\Controllers\Wishlist;
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

// user wishlist routes
Route::prefix('v1/user/wishlist')
    ->middleware(['auth:user'])
    ->group(function () {
        Route::post('/attach', [Wishlist\WishlistController::class, 'attach']);
        Route::post('/detach', [Wishlist\WishlistController::class, 'detach']);
        Route::delete('/clear', [Wishlist\WishlistController::class, 'clear']);
        Route::get('/', [Wishlist\WishlistController::class, 'index']);
    });
