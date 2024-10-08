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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->string('category');
            $table->string('sub_category')->nullable();
            $table->string('tags')->nullable();
            $table->float('rate');
            $table->integer('tax')->nullable();
            $table->integer('quantity');
            $table->integer('quantity_alert')->nullable();
            $table->string('status');
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->string('product_unit');
            $table->integer('unit_quantity');
            $table->string('brand');
            $table->float('purchase_price');
            $table->float('unit_price');
            $table->integer('unit_pieces');
            $table->integer('package_quantity')->nullable();
            $table->string('content_weight')->nullable();
            $table->string('package_weight')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
