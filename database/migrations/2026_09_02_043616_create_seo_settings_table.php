<?php
// database/migrations/2026_09_02_000002_create_seo_settings_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('seo_settings', function (Blueprint $table) {
            $table->id();

            // Polymorphic relation — Page, Product, Category, SubCategory, SubSubCategory, BlogPost etc.
            $table->unsignedBigInteger('seoable_id');
            $table->string('seoable_type');

            $table->string('h1')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();

            $table->string('og_title')->nullable();
            $table->text('og_description')->nullable();
            $table->string('og_image')->nullable(); // manual override; agar null to fallback logic accessor me

            $table->string('twitter_card_type')->default('summary_large_image');
            $table->string('twitter_title')->nullable();
            $table->text('twitter_description')->nullable();
            $table->string('twitter_image')->nullable();

            // Manual JSON-LD override (agar auto-generated schema ko kabhi hardcode karna ho)
            $table->text('json_ld_override')->nullable();

            $table->timestamps();

            $table->unique(['seoable_id', 'seoable_type'], 'seoable_unique');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('seo_settings');
    }
};