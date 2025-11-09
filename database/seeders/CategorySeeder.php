<?php

namespace Database\Seeders;

use App\Models\category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categoryPhones = new category();
        $categoryPhones->name = "Phones";
        $categoryPhones->save();

        $categoryComputers = new category();
        $categoryComputers->name = "Computers";
        $categoryComputers->save();
    }

}
