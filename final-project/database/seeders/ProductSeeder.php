<?php

// database/seeders/ProductSeeder.php
namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $category = Category::first();
        $brand = Brand::first();

        Product::create([
            'name' => 'T-shirt',
            'description' => 'A comfortable cotton T-shirt',
            'price' => 19.99,
            'category_id' => $category->id,
            'brand_id' => $brand->id,
            'image' => 'tshirt.jpg',
            'featured' => true,
        ]);
        // Add more products as needed...
    }
}

