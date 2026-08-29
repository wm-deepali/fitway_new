<?php
// database/migrations/xxxx_xx_xx_create_portfolios_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cat_id')->constrained('portfolio_categories')->cascadeOnDelete();
            $table->string('name');
            $table->string('subtitle')->nullable(); // e.g. "Gym Setup & Equipment"
            $table->string('image')->nullable();
            $table->string('video')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('portfolios');
    }
};