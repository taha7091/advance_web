<?php

// database/seeders/CategorySeeder.php
namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::create(['name' => 'Clothing', 'slug' => 'clothing']);
        Category::create(['name' => 'Accessories', 'slug' => 'accessories']);
        // Add more categories as needed...
    }
}
