<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('ja_JP');
        $productModel = model('Product');
        $stockLogModel = model('StockLog');

        for ($i = 0; $i < 5000; $i++) {
            // 商品データの作成
            $productData = [
                'name'          => $faker->word . $faker->randomElement(['シャツ', 'パンツ', '靴下', '帽子']),
                'sku'           => strtoupper($faker->bothify('???-####')),
                'current_stock' => $faker->numberBetween(10, 50),
                'min_stock'     => 5,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ];

            // insertして生成されたIDを取得
            $productId = $productModel->insert($productData);

            // 各商品に3件ずつの履歴を紐付ける
            for ($j = 0; $j < 3; $j++) {
                $stockLogModel->insert([
                    'product_id' => $productId,
                    'type'       => $faker->randomElement(['in', 'out']),
                    'quantity'   => $faker->numberBetween(1, 10),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
            }
        }
    }
}
