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
    <title><?= esc($title) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1><?= esc($title) ?></h1>
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
                        <!-- 取得した商品一覧データが空でないなら表示 -->
                        <?php if (!empty($products)): ?>
                            <?php foreach ($products as $product): ?>
                                <tr>
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