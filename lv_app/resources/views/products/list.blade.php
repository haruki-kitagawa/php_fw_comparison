<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? '商品一覧' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="bg-white border-bottom shadow-sm mb-4 py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <span class="fw-bold text-secondary small text-uppercase" style="letter-spacing: 0.05em;">商品管理システム</span>

            <div class="d-flex align-items-center gap-3">
                <span class="text-secondary small">
                    ログイン中: <strong class="text-dark">{{ auth()->user()->name }}</strong> 
                    <span class="badge bg-secondary-subtle text-secondary ms-1">{{ auth()->user()->role }}</span>
                </span>

                <form method="POST" action="{{ route('logout') }}" class="m-0" onsubmit="return confirm('ログアウトしますか？');">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-outline-secondary fw-medium px-3">
                        ログアウト
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        @if (session('status'))
            <div class="alert alert-success border-0 small shadow-sm py-2 px-3 mb-4" role="alert">
                {{ session('status') }}
            </div>
        @endif
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
                            <tr onclick="location.href='{{ route('detail', $product->id) }}'" class="cursor-pointer hover:bg-gray-50">
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