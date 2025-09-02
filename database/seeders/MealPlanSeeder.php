<?php

namespace Database\Seeders;

use App\Models\Meal;
use App\Models\MealPlan;
use Illuminate\Database\Seeder;

class MealPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//         MealPlan::factory()->create([
//             'name' => 'Weight Loss',
//             'description' => 'Calorie-controlled meals (1200-1500 calories per day)
//              designed to help you lose weight while staying satisfied.',
//             'meals' => Meal::all()->random(rand(1, 5))->map(function ($meal) {
//                 return [
//                     '_id' => $meal->_id,
//                     'name' => $meal->name,
//                     'description' => $meal->description,
//                     'calories' => $meal->calories,
//                 ];
//             })->toArray(),
//         ]);
//
//        MealPlan::factory()->create([
//            'name' => 'Stay Fit',
//            'description' => 'Well-rounded meals (1600-1900 calories per day) with
//             optimal proportions of proteins, carbs, and healthy fats.',
//            'meals' => Recipe::all()->random(rand(1, 5))->map(function ($meal) {
//                return [
//                    '_id' => $meal->_id,
//                    'name' => $meal->name,
//                    'description' => $meal->description,
//                    'calories' => $meal->calories,
//                ];
//            })->toArray(),
//        ]);
//
//        MealPlan::factory()->create([
//            'name' => 'Muscle Gain',
//            'description' => 'Protein-rich meals (2200-2500 calories per day) to support
//             muscle growth and recovery after workouts',
//            'meals' => Recipe::all()->random(rand(1, 5))->map(function ($meal) {
//                return [
//                    '_id' => $meal->_id,
//                    'name' => $meal->name,
//                    'description' => $meal->description,
//                    'calories' => $meal->calories,
//                ];
//            })->toArray(),
//        ]);
//
//        MealPlan::factory()->create([
//            'name' => 'Keto',
//            'description' => 'Low-carb, high-fat meals (1700-1900 calories per day)
//             designed to help you achieve and maintain ketosis.',
//            'meals' => Recipe::all()->random(rand(1, 5))->map(function ($meal) {
//                return [
//                    '_id' => $meal->_id,
//                    'name' => $meal->name,
//                    'description' => $meal->description,
//                    'calories' => $meal->calories,
//                ];
//            })->toArray(),
//        ]);
    }
}
