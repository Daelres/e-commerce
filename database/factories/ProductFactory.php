<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        $brand = Brand::inRandomOrder()->first();
        $category = Category::inRandomOrder()->first();
        return [
            'name' => fake()->name(),
            'description' => fake()->paragraph(),
            'price' => fake()->randomFloat(2, 10000, 1000000),
            'category_id' => $category ? $category->id : null,
            'brand_id' => $brand ? $brand->id : null,
        ];
    }
}
