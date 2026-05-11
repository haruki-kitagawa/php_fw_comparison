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
        return [
            'name' => $this->faker->word() . ' ' . $this->faker->randomElement(['シャツ', 'パンツ', '靴下', '帽子']),
            'sku'  => strtoupper($this->faker->bothify('???-####')),
            'current_stock' => $this->faker->numberBetween(10, 50), // 初期在庫
            'min_stock' => 5,
        ];
    }
}
