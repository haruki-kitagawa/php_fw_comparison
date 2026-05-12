<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 商品を20個作成し、それぞれに紐づく履歴を3件ずつ作成
        \App\Models\Product::factory(5000)
            ->hasStockLogs(3) 
            ->create();
    }
}
