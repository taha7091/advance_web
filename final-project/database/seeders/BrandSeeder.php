<?php

// database/seeders/BrandSeeder.php
namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    public function run()
    {
        Brand::create(['name' => 'Nike', 'slug' => 'nike']);
        Brand::create(['name' => 'Adidas', 'slug' => 'adidas']);
        // Add more brands as needed...
    }
}

