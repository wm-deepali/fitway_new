<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->string('complaint_code', 20)->unique();

            // Linked customer (nullable — website submitters may not exist as a Customer yet)
            $table->foreignId('customer_id')->nullable()->constrained('customers')->nullOnDelete();

            // Snapshot fields — always stored regardless of customer_id
            $table->string('customer_name');
            $table->string('email')->nullable();
            $table->string('mobile_number', 15);
            $table->text('full_address');
            $table->string('landmark')->nullable();
            $table->foreignId('state_id')->constrained('states');
            $table->foreignId('city_id')->constrained('cities');
            $table->string('pin_code', 10);
            $table->text('complaint_detail');

            // Paid / Unpaid + service info
            $table->string('complaint_type', 10)->default('unpaid');
            $table->text('service_detail')->nullable();
            $table->decimal('paid_price', 10, 2)->nullable();

            // Assignment
            $table->foreignId('technician_id')->nullable()->constrained('technicians')->nullOnDelete();
            $table->date('schedule_date')->nullable();

            $table->tinyInteger('status')->default(1)
                ->comment('1=New Complaint, 2=Under Process, 3=Completed');

            $table->string('source', 20)->default('admin')->comment('admin or website');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('complaints');
    }
};