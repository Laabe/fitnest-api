<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['name' => 'protein bars']);
        Category::create(['name' => 'granola']);
        Category::create(['name' => 'breakfast']);
    }
}
