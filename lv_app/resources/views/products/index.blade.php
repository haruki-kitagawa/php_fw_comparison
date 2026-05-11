<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? '商品一覧' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>{{ $title ?? '商品一覧_Laravel' }}</h1>
            <span class="badge bg-primary fs-5">Total: {{ count($products) }} items</span>
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
                        {{-- @forelseを使うと、データがある時とない時をスマートに分けられます --}}
                        @forelse ($products as $product)
                            <tr>
                                {{-- Laravel(Eloquent)はオブジェクト形式でアクセス --}}
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->sku }}</td>
                                <td>{{ $product->current_stock }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="4" class="text-center">No data found.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>