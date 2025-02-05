<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'name' => 'Laptop',
            'description' => 'A powerful laptop',
            'price' => 799.99,
            'stock' => 50
        ]);

        Product::create([
            'name' => 'Smartphone',
            'description' => 'Latest Android smartphone',
            'price' => 599.99,
            'stock' => 100
        ]);
    }
}

