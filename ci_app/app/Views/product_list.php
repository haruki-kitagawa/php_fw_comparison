<?php
/**
 * 後から挿入されるデータ(エラー回避用)
 * @var string $title
 * @var array $products
 */
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? '商品一覧') ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .cursor-pointer { cursor: pointer; }
    </style>
</head>
<body class="bg-light">

    <div class="bg-white border-bottom shadow-sm mb-4 py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <span class="fw-bold text-secondary small text-uppercase" style="letter-spacing: 0.05em;">商品管理システム</span>

            <div class="d-flex align-items-center gap-3">
                <span class="text-secondary small">
                    ログイン中: <strong class="text-dark"><?= esc(auth()->user()->username ?? 'ゲスト') ?></strong> 
                    <span class="badge bg-secondary-subtle text-secondary ms-1">admin</span>
                </span>

                <form method="POST" action="<?= url_to('logout') ?>" class="m-0" onsubmit="return confirm('ログアウトしますか？');">
                    <?= csrf_field() ?>
                    <button type="submit" class="btn btn-sm btn-outline-secondary fw-medium px-3">
                        ログアウト
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <?php if (session('message')) : ?>
            <div class="alert alert-success border-0 small shadow-sm py-2 px-3 mb-4" role="alert">
                <?= session('message') ?>
            </div>
        <?php endif ?>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1><?= esc($title ?? '商品一覧_CodeIgniter') ?></h1>
            <span class="badge bg-primary fs-5">Total: <?= count($products) ?> items</span>
        </div>
        
        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>SKU</th>
                            <th>Stock</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($products)): ?>
                            <?php foreach ($products as $product): ?>
                                <tr onclick="location.href='<?= url_to('Detail::index', esc($product['id'], 'url')) ?>'" class="cursor-pointer">
                                    <td><?= esc($product['id']) ?></td>
                                    <td><?= esc($product['name']) ?></td>
                                    <td><?= esc($product['sku']) ?></td>
                                    <td><?= esc($product['current_stock']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr><td colspan="4" class="text-center">No data found.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>