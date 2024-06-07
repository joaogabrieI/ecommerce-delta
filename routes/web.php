<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'index']);
Route::get('/product/{PRODUTO_ID}', [ProductController::class, 'show'])->name('product.show');
Route::get('/products', [ProductController::class, 'productsCategory'])->name('products');
Route::get('products/category/{category}', [CategoryController::class, 'index'])->name('products.category');
Route::get('/search', [ProductController::class, 'search'])->name('search');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/{user}', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
