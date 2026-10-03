<?php

use App\Http\Controllers\Api\DiscountController;
use App\Http\Controllers\Api\FavoriteController;
use Illuminate\Support\Facades\Route;

// --- Discounts (read only; shops write through the web portal) ---
Route::get('/discounts', [DiscountController::class, 'index']);
Route::get('/discounts/{discount}', [DiscountController::class, 'show']);

// --- Favorites (the app reads + writes these per Firebase user) ---
Route::get('/favorites', [FavoriteController::class, 'index']);
Route::post('/favorites', [FavoriteController::class, 'store']);
Route::delete('/favorites', [FavoriteController::class, 'destroy']);
