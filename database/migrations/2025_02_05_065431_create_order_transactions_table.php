<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('order_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->decimal('amount', 10, 2);
            $table->string('payment_method'); // Stripe, Razorpay, PayPal, etc.
            $table->string('status')->default('pending'); // pending, success, failed
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_transactions');
    }
};

