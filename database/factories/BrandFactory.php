<?php

namespace Database\Factories;

use App\Models\brand;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BrandFactory extends Factory
{
    protected $model = brand::class;
    public function definition(): array
    {
        return [
            'name' => fake()->name()
        ];
    }
}
