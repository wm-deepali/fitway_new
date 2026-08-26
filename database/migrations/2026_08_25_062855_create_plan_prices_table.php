<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('plan_prices', function (Blueprint $table) {
            $table->id();
            $table->string('title_1')->nullable();
            $table->string('title_2')->nullable();
            $table->string('title_3')->nullable();
            $table->string('title_4')->nullable();
            $table->unsignedInteger('days')->nullable();
            $table->string('image')->nullable();
            $table->string('class')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->enum('montly_yearly', ['month', 'year'])->nullable();
            $table->enum('plan', ['medium', 'standard', 'premium'])->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('plan_prices');
    }
};