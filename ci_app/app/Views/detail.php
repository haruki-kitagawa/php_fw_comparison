<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品詳細 - <?= esc($product['name']) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light text-dark">

    <div class="container py-5" style="max-width: 1140px;">
        <div class="mb-4">
            <a href="<?= site_url('products') ?>" class="text-decoration-none text-primary fw-medium">&larr; 商品一覧へ戻る</a>
        </div>

        <div class="card border-0 shadow-sm overflow-hidden d-md-flex flex-md-row">
            
            <div class="col-md-6 bg-light d-flex align-items-center justify-content-center p-4 min-vh-25">
                <?php if (!empty($product['image_url'])): ?>
                    <img src="<?= esc($product['image_url']) ?>" alt="<?= esc($product['name']) ?>" class="img-fluid rounded">
                <?php else: ?>
                    <div class="text-center text-secondary">
                        <div class="mb-2">No Image</div>
                    </div>
                <?php endif; ?>
            </div>

            <div class="col-md-6 p-5 d-flex flex-column justify-content-between">
                <div>
                    <span class="badge bg-primary-subtle text-primary text-uppercase mb-3">
                        <?= esc($product['type']) ?>
                    </span>

                    <h1 class="h2 fw-bold text-dark mb-2">
                        <?= esc($product['name']) ?>
                    </h1>

                    <p class="text-secondary small mb-4">
                        型番 (SKU): <span class="bg-light border px-2 py-1 rounded font-monospace text-dark"><?= esc($product['sku']) ?></span>
                    </p>

                    <div class="mb-4">
                        <h2 class="h6 text-uppercase text-secondary fw-bold mb-2">商品説明</h2>
                        <p class="text-dark small">
                            <?= esc($product['desc']) ?>
                        </p>
                    </div>
                </div>

                <div class="border-top pt-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <span class="text-uppercase text-secondary fw-bold d-block small mb-1">現在の在庫</span>
                            <span class="h3 fw-extrabold text-dark"><?= esc($product['current_stock']) ?></span> <span class="text-secondary small">個</span>
                        </div>
                        <div class="text-end">
                            <span class="text-uppercase text-secondary fw-bold d-block small mb-1">最低発注アラート数</span>
                            <span class="small fw-medium text-dark"><?= esc($product['min_stock']) ?> 個</span>
                        </div>
                    </div>

                    <?php if ($product['current_stock'] <= $product['min_stock']): ?>
                        <div class="alert alert-warning border-0 small d-flex align-items-center gap-2 m-0">
                            <span>警告: 在庫が少なくなっています。発注を検討してください。</span>
                        </div>
                    <?php else: ?>
                        <div class="alert alert-success border-0 small d-flex align-items-center gap-2 m-0">
                            <span class="fw-medium">在庫ステータス: 良好</span>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>