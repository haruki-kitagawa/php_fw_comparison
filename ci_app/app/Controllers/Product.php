<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Product as ProductModel;
use CodeIgniter\HTTP\ResponseInterface;

class Product extends BaseController
{
    public function index()
    {
        // 商品モデルのインスタンス
        $model = new ProductModel();

        // 商品一覧取得
        $data = [
            'title' => '商品一覧_CodeIgniter',
            'products' => $model->findAll(),    // 全件取得
        ];

        // viewにデータgit checkout -b feature/laravel-productを渡す
        return view('product_list', $data);
    }
}
