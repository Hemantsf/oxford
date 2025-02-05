<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OrderTransaction;

class OrderTransactionSeeder extends Seeder
{
    public function run()
    {
        OrderTransaction::create([
            'order_id' => 2,
            'amount' => 1599.98,
            'payment_method' => 'Credit Card',
            'status' => 'pending'
        ]);
    }
}
