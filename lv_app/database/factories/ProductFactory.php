<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // 1. 英語のタイプをランダムに選択
        $types = ['shirt', 'pants', 'socks', 'cap'];
        $randomType = $this->faker->randomElement($types);

        // 2. 画像ファイル名を生成（例: shirt03.png）
        $imageNumber = sprintf('%02d', rand(1, 5));
        $imageName = $randomType . $imageNumber . '.png';

        // 3. 日本語の商品名を作りたい場合のマッピング
        $japaneseNames = [
            'shirt' => 'シャツ',
            'pants' => 'パンツ',
            'socks' => '靴下',
            'cap'   => '帽子'
        ];
        $typeNameJa = $japaneseNames[$randomType];

        return [
            'type' => $randomType,
            'name' => $this->faker->word() . $typeNameJa . '-' . $this->faker->unique()->bothify('??-###'),
            'image_url' => '/images/' . $imageName,
            'sku' => $this->faker->unique()->bothify('???-####'),
            'desc' => $this->faker->realTextBetween(60, 100),
            'current_stock' => $this->faker->numberBetween(0, 100),
            'min_stock' => $this->faker->numberBetween(5, 15),
        ];
    }
}
