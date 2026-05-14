<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UpdateStockSeeder extends Seeder
{
    // CI4: ランダムに100件取得して更新
    public function run()
    {
        $db = \Config\Database::connect();

        // 在庫を増やす100件のIDを取得
        $ids = $db->table('products')
                ->select('id')
                ->orderBy('id', 'RANDOM') // ランダム
                ->limit(100)
                ->get()
                ->getResultArray();
        
        $targetIds = array_column($ids, 'id');

        if (!empty($targetIds)) {
            // 在庫を50増やす
            $db->table('products')
            ->whereIn('id', $targetIds)
            ->set('current_stock', 'current_stock + 50', false) // falseで数式として扱う
            ->update();
        }
    }
}
