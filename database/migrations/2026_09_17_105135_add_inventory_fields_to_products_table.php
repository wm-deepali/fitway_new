<?php
// database/migrations/2026_09_18_000001_add_inventory_fields_to_products_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Drop the old required foreign key on category_id first —
            // can't change nullability while the old constraint exists.
            $table->dropForeign(['category_id']);
        });

        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->nullable()->change();

            $table->foreign('category_id')
                ->references('id')->on('product_categories')
                ->nullOnDelete();

            $table->enum('source_type', ['catalog', 'internal_inventory'])
                ->default('catalog')
                ->after('id');

            $table->foreignId('vendor_id')->nullable()
                ->constrained('vendors')->nullOnDelete()
                ->after('sub_sub_cat_id');

            $table->foreignId('brand_id')->nullable()
                ->constrained('brands')->nullOnDelete()
                ->after('vendor_id');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['vendor_id']);
            $table->dropForeign(['brand_id']);
            $table->dropColumn(['vendor_id', 'brand_id', 'source_type']);

            $table->dropForeign(['category_id']);
        });

        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->nullable(false)->change();
            $table->foreign('category_id')->references('id')->on('product_categories')->cascadeOnDelete();
        });
    }
};