<?php

namespace Database\Factories;

use App\Models\StockLog;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<StockLog>
 */
class StockLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // product_id は Seeder 実行時に紐付けるのでここでは定義不要（または Product::factory()）
            'type' => $this->faker->randomElement(['in', 'out']),
            'quantity' => $this->faker->numberBetween(1, 10),
        ];
    }
}
