<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\{ProductController, CartController};

Route::get('/products', [ProductController::class,'index'])->name('products');
Route::get('/product/{slug}', [ProductController::class,'detail'])->name('product.detail');

Route::post('/cart', [CartController::class,'store'])->name('cart.store');

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
