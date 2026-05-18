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
        // 商品タイプ: ランダム選択
        $type = $this->faker->randomElement(['シャツ', 'パンツ', '靴下', '帽子']);
        return [
            'type' => $type,
            'name' => $this->faker->word() . $type . '-' . $this->faker->unique()->bothify('??-###'),
            'image_url' => $this->faker->optional(0.7)->imageUrl(640, 480, 'clothes', true), // 7割の確率で画像、3割でnull
            'sku' => $this->faker->unique()->bothify('???-####'),
            'desc' => $this->faker->realTextBetween(60, 100),
            'current_stock' => $this->faker->numberBetween(0, 100),
            'min_stock' => $this->faker->numberBetween(5, 15),
        ];
    }
}
