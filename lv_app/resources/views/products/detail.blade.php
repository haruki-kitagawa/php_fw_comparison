<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品詳細 - {{ $product->name }}</title>
    <!-- CSS読み込みをlinkタグに変更 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light text-dark">

    <div class="container py-5" style="max-width: 1140px;">
        <div class="mb-4">
            <a href="{{ route('products') }}" class="text-decoration-none text-primary fw-medium">&larr; 商品一覧へ戻る</a>
        </div>

        <div class="card border-0 shadow-sm overflow-hidden d-md-flex flex-md-row">
            
            <div class="col-md-6 bg-light d-flex align-items-center justify-content-center p-4 min-vh-25">
                @if($product->image_url)
                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="img-fluid rounded">
                @else
                    <div class="text-center text-secondary">
                        <div class="mb-2">No Image</div>
                    </div>
                @endif
            </div>

            <div class="col-md-6 p-5 d-flex flex-column justify-content-between">
                <div>
                    <span class="badge bg-primary-subtle text-primary text-uppercase mb-3">
                        {{ $product->type }}
                    </span>

                    <h1 class="h2 fw-bold text-dark mb-2">
                        {{ $product->name }}
                    </h1>

                    <p class="text-secondary small mb-4">
                        型番 (SKU): <span class="bg-light border px-2 py-1 rounded font-monospace text-dark">{{ $product->sku }}</span>
                    </p>

                    <div class="mb-4">
                        <h2 class="h6 text-uppercase text-secondary fw-bold mb-2">商品説明</h2>
                        <p class="text-dark small">
                            {{ $product->desc }}
                        </p>
                    </div>
                </div>

                <div class="border-top pt-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <span class="text-uppercase text-secondary fw-bold d-block small mb-1">現在の在庫</span>
                            <span class="h3 fw-extrabold text-dark">{{ $product->current_stock }}</span> <span class="text-secondary small">個</span>
                        </div>
                        <div class="text-end">
                            <span class="text-uppercase text-secondary fw-bold d-block small mb-1">最低発注アラート数</span>
                            <span class="small fw-medium text-dark">{{ $product->min_stock }} 個</span>
                        </div>
                    </div>

                    @if($product->current_stock <= $product->min_stock)
                        <div class="alert alert-warning border-0 small d-flex align-items-center gap-2 m-0">
                            <span>警告: 在庫が少なくなっています。発注を検討してください。</span>
                        </div>
                    @else
                        <div class="alert alert-success border-0 small d-flex align-items-center gap-2 m-0">
                            <span class="fw-medium">在庫ステータス: 良好</span>
                        </div>
                    @endif

                    <!-- 管理者のみに表示 -->
                    @if(auth()->user()->role === 'admin')
                        <div class="card bg-light border-0 p-3 mb-3 shadow-sm">
                            <h3 class="h6 fw-bold text-secondary text-uppercase mb-3">商品管理 (管理者用)</h3>
                            
                            @error('quantity')
                                <div class="alert alert-danger border-0 small py-2 px-3 mb-3">{{ $message }}</div>
                            @enderror
                            
                            @if (session('status'))
                                <div class="alert alert-success border-0 small py-2 px-3 mb-3">{{ session('status') }}</div>
                            @endif
                            
                            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
                                
                                <form action="{{ route('products.update_stock', $product->id) }}" method="POST" class="d-flex gap-2 m-0 flex-grow-1" style="max-width: 260px;">
                                    @csrf
                                    @method('PATCH')
                                    <input type="number" name="quantity" class="form-control form-control-sm border-light-subtle" placeholder="数量（例: 5 や -3）" required>
                                    <button type="submit" class="btn btn-sm btn-primary px-3 fw-medium text-nowrap">在庫を更新</button>
                                </form>

                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="m-0" onsubmit="return confirm('本当にこの商品を削除しますか？（関連する在庫ログも削除されます）');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger px-3 text-nowrap">
                                        この商品を削除する
                                    </button>
                                </form>

                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

</body>
</html>