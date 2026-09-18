<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('quote_settings', function (Blueprint $table) {
            $table->id();

            // Company Info
            $table->string('company_logo')->nullable();
            $table->string('company_name')->nullable();
            $table->longText('company_introduction')->nullable();
            $table->string('address')->nullable();
            $table->foreignId('state_id')->nullable()->constrained('states')->nullOnDelete();
            $table->foreignId('city_id')->nullable()->constrained('cities')->nullOnDelete();
            $table->string('pincode', 10)->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('website')->nullable();
            $table->string('gst_number')->nullable();

            // Proposal ID Settings
            $table->string('id_prefix', 20)->default('B2B');
            $table->unsignedTinyInteger('id_padding_length')->default(5);
            $table->unsignedBigInteger('current_serial')->default(0);

            // Terms & Conditions
            $table->longText('terms_conditions')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quote_settings');
    }
};