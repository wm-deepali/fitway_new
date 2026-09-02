<?php
// database/migrations/xxxx_xx_xx_xxxxxx_update_product_enquiries_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('product_enquiries', function (Blueprint $table) {
            // Remove unwanted fields
            $table->dropColumn(['city', 'state', 'address', 'pin']);

            // Add new fields
            $table->foreignId('product_id')
                ->after('id')
                ->constrained('products')
                ->cascadeOnDelete();

            $table->text('details')->nullable()->after('phone');
        });
    }

    public function down(): void
    {
        Schema::table('product_enquiries', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
            $table->dropColumn(['product_id', 'details']);

            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('address')->nullable();
            $table->string('pin')->nullable();
        });
    }
};