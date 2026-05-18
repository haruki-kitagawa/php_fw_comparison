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
            // 商品タイプ名選択
            $type = $faker->randomElement(['シャツ', 'パンツ', '靴下', '帽子']);
            
            // 枝番生成
            $threeDigit = sprintf('%03d', $i % 1000); 
            $branchNumber = $faker->lexify('??') . '-' . $threeDigit;

            // 商品説明文生成
            $desc = $faker->realText(100);
            while (mb_strlen($desc) < 60) {
                $desc = $faker->realText(100);
            }

            // 商品データの作成
            $productData = [
                'name'          => $faker->word . $type . '-' . $branchNumber,
                'type'          => $type,
                'image_url'     => $faker->boolean(70) ? 'https://picsum.photos/200/200?random=' . $i : null,
                'sku'           => strtoupper($faker->bothify('???-####')),
                'desc'          => $desc,
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
