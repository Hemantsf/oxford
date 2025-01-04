<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesSeeder extends Seeder
{
    public function run()
{
    Category::truncate();
    \App\Models\Category::create(['name' => 'Programming']);
    \App\Models\Category::create(['name' => 'Design']);
    \App\Models\Category::create(['name' => 'Business']);
    \App\Models\Category::create(['name' => 'Marketing']);
}
}
