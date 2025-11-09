<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;


class CategoryFactory extends Factory
{
    protected $model = Category::class;
    public function definition(): array
    {
        $category = [
            'Electronics',
            'Books',
            'Clothing',
            'Home & Kitchen',
            'Sports & Outdoors',
            'Toys & Games',
            'Health & Personal Care',
            'Automotive',
            'Beauty',
            'Grocery'
        ];

        return [
            'name' => $this->faker->unique()->randomElement($category)
        ];
    }
}
