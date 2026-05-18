<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UpdateStockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 在庫を増やす
        \App\Models\Product::inRandomOrder()->take(100)->increment('current_stock', 50);

        // 在庫を減らす（別の100件）
        \App\Models\Product::inRandomOrder()->take(100)->decrement('current_stock', 50);
    }
}
