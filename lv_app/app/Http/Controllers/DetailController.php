<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    // 商品詳細画面
    public function index($id)
    {
        // クエリパラメータで渡されたIDに一致する商品情報を取得
        $product = Product::findOrFail($id);
        
        return view('products.detail', compact('product'));
    }

    // 在庫更新の受け皿
    public function updateStock(Request $request, $id)
    {
        // 入力値のチェック
        $request->validate([
            'quantity' => ['required', 'integer'],
        ]);

        $product = Product::findOrFail($id);                // 該当の商品をデータベースから取得
        $quantity = (int)$request->input('quantity');       // 入力された増減数を取得
        $newStock = $product->current_stock + $quantity;    // 新しい在庫数を計算

        // 在庫数がマイナスになってしまう場合はエラーを返す
        if ($newStock < 0) {
            return redirect()->back()
                ->withErrors(['quantity' => '在庫数がマイナスになる調整はできません（現在の在庫: ' . $product->current_stock . '個）'])
                ->withInput();
        }

        $product->current_stock = $newStock;                // 在庫数を更新
        $product->save();                                   // 保存

        // 成功メッセージを表示
        return redirect()->route('detail', $id)->with('status', '在庫数を更新しました！');
    }

    // 商品削除の受け皿
    public function destroy($id)
    {
        $product = Product::findOrFail($id);    // 商品検索
        $product->delete();                     // DBから削除

        // 削除完了メッセージを送る
        return redirect()->route('products')->with('status', '「' . $product->name . '」を削除しました。');
    }
    
}
