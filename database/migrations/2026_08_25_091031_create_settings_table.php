<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();

            // Logo
            $table->string('logo_image')->nullable();

            // Header
            $table->string('header_email')->nullable();
            $table->string('header_phone')->nullable();
            $table->text('header_analytics')->nullable();
            $table->text('header_ads')->nullable();

            // Footer
            $table->string('footer_email')->nullable();
            $table->string('footer_phone_1')->nullable();
            $table->string('footer_phone_2')->nullable();
            $table->string('footer_address')->nullable();

            // Newsletter
            $table->text('newsletter_description')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};