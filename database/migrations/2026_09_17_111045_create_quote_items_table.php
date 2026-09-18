<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('quote_items', function (Blueprint $table) {
            $table->id();

            $table->foreignId('quote_id')->constrained('quotes')->cascadeOnDelete();
            $table->foreignId('product_id')->nullable()->constrained('products')->nullOnDelete();
            $table->foreignId('brand_id')->nullable()->constrained('brands')->nullOnDelete();

            $table->string('sku_code')->nullable();
            $table->string('hsn_code')->nullable();

            // Snapshot fields (captured at the time of adding to the quote)
            $table->string('product_name');
            $table->string('product_image')->nullable();
            $table->longText('product_features')->nullable(); // pulled from the product's Features/description
            $table->boolean('show_features')->default(false);  // print Features on the quotation PDF only if checked

            $table->decimal('price', 10, 2);
            $table->decimal('tax_percentage', 5, 2)->default(5);
            $table->decimal('tax_amount', 10, 2)->default(0);
            $table->unsignedInteger('quantity');
            $table->decimal('total_price', 12, 2);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quote_items');
    }
};