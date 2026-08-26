<?php
// database/migrations/2026_08_25_000003_create_products_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('product_categories')->cascadeOnDelete();
            $table->foreignId('sub_cat_id')->nullable()->constrained('product_sub_categories')->nullOnDelete();
            $table->foreignId('mini_sub_cat_id')->nullable()->constrained('product_mini_sub_categories')->nullOnDelete();
            $table->string('name');
            $table->string('slug')->unique();
            $table->decimal('previous_price', 10, 2)->nullable();
            $table->decimal('new_price', 10, 2)->nullable();
            $table->longText('description')->nullable();
            $table->string('image')->nullable();
            $table->boolean('status')->default(true);
            $table->string('meta_title')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};