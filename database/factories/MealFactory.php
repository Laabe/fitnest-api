<?php

namespace Database\Factories;

use App\Models\Meal;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Meal>
 */
class MealFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => implode(' ', $this->faker->words()),
            'description' => implode(' ', $this->faker->sentences()),
            'image' => $this->faker->imageUrl(),
            'calories' => $this->faker->randomFloat(2, 100, 1000),
            'protein' => $this->faker->randomFloat(2, 10, 100),
            'carbohydrates' => $this->faker->randomFloat(2, 10, 100),
            'fats' => $this->faker->randomFloat(2, 1, 50),
            'meal_type' => $this->faker->randomElement(['breakfast', 'lunch', 'dinner', 'snack']),
        ];
    }
}
