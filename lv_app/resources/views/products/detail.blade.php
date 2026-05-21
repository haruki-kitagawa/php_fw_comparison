<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品詳細 - {{ $product->name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 antialiased font-sans">

    <div class="max-w-4xl mx-auto px-4 py-10">
        <div class="mb-6">
            <a href="{{ route('products') }}" class="text-indigo-600 hover:text-indigo-800 text-sm font-medium">&larr; 商品一覧へ戻る</a>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden md:flex">
            
            <div class="md:w-1/2 bg-gray-100 flex items-center justify-center p-6 min-h-[300px]">
                @if($product->image_url)
                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="max-w-full h-auto object-cover rounded-lg shadow-sm">
                @else
                    <div class="text-center text-gray-400">
                        <svg class="mx-auto h-12 w-12 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 002-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <p class="text-xs">No Image</p>
                    </div>
                @endif
            </div>

            <div class="md:w-1/2 p-8 flex flex-col justify-between">
                <div>
                    <span class="inline-block bg-indigo-50 text-indigo-700 text-xs px-2.5 py-1 rounded-full font-semibold tracking-wide uppercase mb-3">
                        {{ $product->type }}
                    </span>

                    <h1 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">
                        {{ $product->name }}
                    </h1>

                    <p class="text-sm text-gray-500 mb-6">
                        型番 (SKU): <span class="font-mono bg-gray-100 px-1.5 py-0.5 rounded text-gray-700">{{ $product->sku }}</span>
                    </p>

                    <div class="mb-6">
                        <h2 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">商品説明</h2>
                        <p class="text-gray-600 leading-relaxed text-sm md:text-base">
                            {{ $product->desc }}
                        </p>
                    </div>
                </div>

                <div class="border-t border-gray-100 pt-6">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <span class="text-xs font-bold text-gray-400 uppercase tracking-wider block mb-1">現在の在庫</span>
                            <span class="text-2xl font-extrabold text-gray-900">{{ $product->current_stock }}</span> <span class="text-gray-500 text-sm">個</span>
                        </div>
                        <div class="text-right">
                            <span class="text-xs font-bold text-gray-400 uppercase tracking-wider block mb-1">最低発注アラート数</span>
                            <span class="text-sm font-medium text-gray-600">{{ $product->min_stock }} 個</span>
                        </div>
                    </div>

                    @if($product->current_stock <= $product->min_stock)
                        <div class="bg-amber-50 border border-amber-200 text-amber-800 text-xs rounded-lg p-3 flex items-center gap-2">
                            <svg class="h-4 w-4 text-amber-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                            <span>警告: 在庫が少なくなっています。発注を検討してください。</span>
                        </div>
                    @else
                        <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs rounded-lg p-3 flex items-center gap-2">
                            <svg class="h-4 w-4 text-emerald-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="font-medium">在庫ステータス: 良好</span>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>

</body>
</html>