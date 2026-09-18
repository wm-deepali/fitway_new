<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('vendor_name');
            $table->string('gst_number', 20)->nullable();
            $table->text('full_address');
            $table->string('email');
            $table->string('contact_person_name');
            $table->string('mobile_number', 15);
            $table->string('whatsapp_number', 15)->nullable();
            $table->foreignId('state_id')->nullable()->constrained('states')->nullOnDelete();
            $table->foreignId('city_id')->nullable()->constrained('cities')->nullOnDelete();
            $table->string('pincode', 10)->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();

            $table->index(['vendor_name', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};