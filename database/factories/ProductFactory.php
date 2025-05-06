<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
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
            'name' => fake()->name(),
            'image' => fake()->imageUrl(),
            'description' => fake()->text(),
            'price' => fake()->randomFloat(2, 1, 100),
            'weight' => fake()->randomFloat(2, 1, 100),
            'stock_quantity' => fake()->numberBetween(1, 100),
            'category_id' => Category::factory()
        ];
    }
}
