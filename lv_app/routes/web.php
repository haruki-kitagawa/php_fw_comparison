<?php

use App\Http\Controllers\DetailController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {
    // 商品在庫一覧
    Route::get('/', [ProductController::class, 'index'])->name('products');
    // 商品詳細
    Route::get('/detail/{id}', [DetailController::class, 'index'])->name('detail');
    Route::patch('/detail/{id}/stock', [DetailController::class, 'updateStock'])->name('products.update_stock');
    Route::delete('/detail/{id}', [DetailController::class, 'destroy'])->name('products.destroy');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
