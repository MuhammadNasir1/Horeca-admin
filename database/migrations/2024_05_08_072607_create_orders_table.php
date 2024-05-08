<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->date('order_date');
            $table->string('customer_name')->nullable();
            $table->integer('customer_id')->nullable();
            $table->string('sub_total');
            $table->string('order_vat');
            $table->string('discount');
            $table->string('grand_total');
            $table->string('order_description');
            $table->string('order_traking');
            $table->string('order_note');
            $table->string('payment_type');
            $table->string('order_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
