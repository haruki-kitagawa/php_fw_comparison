<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// http://localhost:8001/products
Route::get('/products', [ProductController::class, 'index']);