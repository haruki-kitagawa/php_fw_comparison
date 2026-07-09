<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// 1. トップページ「/」にアクセスされたら、自動的に「/products」へリダイレクト
$routes->get('/', function() {
    return redirect()->to('/products');
});

// ログインチェック必須ページ（products グループ）
$routes->group('products', ['filter' => 'session'], function ($routes) {
    $routes->get('', 'Product::index');
    $routes->get('detail/(:num)', 'Detail::index/$1');
});

// ログアウト
$routes->post('logout', '\CodeIgniter\Shield\Controllers\LoginController::logoutAction');


// Shieldの認証ルーティング（/login や /register など）を自動生成
service('auth')->routes($routes);