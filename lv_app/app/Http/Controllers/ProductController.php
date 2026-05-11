<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // データベースから全商品を一括取得
        $products = Product::all();

        // resources/views/products/index.blade.php にデータを渡す
        return view('products.index', compact('products'));
    }
}
