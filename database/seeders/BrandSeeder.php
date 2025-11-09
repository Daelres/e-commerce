<?php

namespace Database\Seeders;

use App\Models\brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    public function run(): void
    {brand::factory(50)->create();
    }
}
