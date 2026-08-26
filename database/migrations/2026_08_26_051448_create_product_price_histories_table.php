<?php
// database/migrations/2026_08_26_000001_create_product_price_histories_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_price_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();

            $table->decimal('old_mrp', 10, 2)->nullable();
            $table->decimal('new_mrp', 10, 2)->nullable();

            $table->string('old_discount_type')->nullable();
            $table->string('new_discount_type')->nullable();

            $table->decimal('old_discount_value', 10, 2)->nullable();
            $table->decimal('new_discount_value', 10, 2)->nullable();

            $table->decimal('old_offered_price', 10, 2)->nullable();
            $table->decimal('new_offered_price', 10, 2)->nullable();

            $table->decimal('old_purchase_price', 10, 2)->nullable();
            $table->decimal('new_purchase_price', 10, 2)->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_price_histories');
    }
};