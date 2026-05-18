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
        // 商品データを5000件生成
        \App\Models\Product::factory(5000)
            ->hasStockLogs(3) 
            ->create();
    }
}
