<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// 1. トップページ「/」にアクセスされたら、自動的に「/products」へリダイレクト
$routes->get('/', function() {
    return redirect()->to('/products');
});

// 2. ログインチェック必須ページ（products グループ）
$routes->group('products', ['filter' => 'session'], function ($routes) {
    
    // これで http://localhost:8002/products にアクセスした時に Product::index が動きます
    $routes->get('', 'Product::index');

    // http://localhost:8002/products/detail/1
    $routes->get('detail/(:num)', 'Detail::index/$1');
});

// Shieldの認証ルーティング（/login や /register など）を自動生成
service('auth')->routes($routes);