<?php

namespace Database\Factories;

use App\Models\Category;
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
        $category = Category::all()->random();
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'sku' => $this->faker->unique()->bothify('SKU-####-????'),
            'status' => $this->faker->randomElement(['active', 'draft', 'archived']),
            'stock_quantity' => $this->faker->numberBetween(0, 100),
            'price' => [
                'base' => $this->faker->randomFloat(2, 10, 500),
                'discount' => $this->faker->boolean(30) ? $this->faker->randomFloat(2, 5, 100) : null,
            ],
            'category_id' => $category->id,
            'variants' => $this->faker->boolean() ? [
                [
                    'name' => 'Color',
                    'value' => $this->faker->randomElement(['Red', 'Blue', 'Green', 'Black', 'White']),
                    'price' => $this->faker->randomFloat(2, 0, 50),
                ],
                [
                    'name' => 'Size',
                    'value' => $this->faker->randomElement(['S', 'M', 'L', 'XL']),
                    'price' => $this->faker->randomFloat(2, 0, 50),
                ],
            ] : null,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
