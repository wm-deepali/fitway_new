<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->id();

            $table->string('proposal_id')->unique()->nullable();
            $table->foreignId('customer_id')->constrained('customers')->cascadeOnDelete();
            $table->decimal('packing_charges', 10, 2)->default(0);
            $table->integer('packing_quantity')->default(1);
            $table->decimal('packing_tax_percentage', 5, 2)->default(0);
            $table->decimal('shipping_charges', 10, 2)->default(0);
            $table->integer('shipping_quantity')->default(1);
            $table->decimal('shipping_tax_percentage', 5, 2)->default(0);
            $table->decimal('total_amount', 12, 2)->default(0);
            $table->string('prepared_by')->nullable();
            $table->string('status')->default('draft'); // 'draft' | 'print_ready'

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quotes');
    }
};