<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    public function run()
    {
        Order::create([
            'product_id' => 1,
            'user_id' => 1,
            'quantity' => 2,
            'total_price' => 1599.98,
            'status' => 'pending'
        ]);
    }
}

