<?php

use App\Http\Controllers\Portal\PortalAuthController;
use App\Http\Controllers\Portal\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// --- Shop portal (web) ---
Route::get('/portal/login', [PortalAuthController::class, 'showLogin'])->name('portal.login');
Route::post('/portal/login', [PortalAuthController::class, 'login'])->name('portal.login.submit');
Route::post('/portal/logout', [PortalAuthController::class, 'logout'])->name('portal.logout');

Route::middleware('portal')->group(function () {
    Route::get('/portal', [ProductController::class, 'index'])->name('portal.index');
    Route::get('/portal/products/create', [ProductController::class, 'create'])->name('portal.create');
    Route::post('/portal/products', [ProductController::class, 'store'])->name('portal.store');
    Route::get('/portal/products/{discount}/edit', [ProductController::class, 'edit'])->name('portal.edit');
    Route::put('/portal/products/{discount}', [ProductController::class, 'update'])->name('portal.update');
    Route::delete('/portal/products/{discount}', [ProductController::class, 'destroy'])->name('portal.destroy');
});
