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

        // 商品タイプ名選択
        $types = ['shirt', 'pants', 'socks', 'cap'];
        $japaneseNames = [
            'shirt' => 'シャツ',
            'pants' => 'パンツ',
            'socks' => '靴下',
            'cap'   => '帽子'
        ];

        for ($i = 0; $i < 5000; $i++) {
            $randomType = $faker->randomElement($types);
            $typeNameJa = $japaneseNames[$randomType];
            
            // 枝番生成
            $threeDigit = sprintf('%03d', $i % 1000); 
            $branchNumber = $faker->lexify('??') . '-' . $threeDigit;

            // 商品説明文生成
            $desc = $faker->realText(100);
            while (mb_strlen($desc) < 60) {
                $desc = $faker->realText(100);
            }
            
            $imageNumber = sprintf('%02d', rand(1, 5));
            $imageName = $randomType . $imageNumber . '.png';

            // 商品データの作成
            $productData = [
                'name'          => $faker->word . $typeNameJa . '-' . $branchNumber,
                'type'          => $randomType,
                'image_url'     => '/images/' . $imageName,
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