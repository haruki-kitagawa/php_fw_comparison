<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    // 商品詳細画面
    public function index()
    {
        $id = 1;
        $product = Product::findOrFail($id);
        
        return view('products.detail', compact('product'));
    }
}
