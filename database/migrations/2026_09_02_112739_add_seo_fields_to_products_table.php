<?php
// database/migrations/2026_09_02_000001_add_seo_fields_to_products_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('h1')->nullable()->after('meta_description');
            $table->string('og_title')->nullable()->after('h1');
            $table->text('og_description')->nullable()->after('og_title');
            $table->string('og_image')->nullable()->after('og_description');
            $table->string('canonical_url')->nullable()->after('og_image');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn([
                'h1',
                'og_title',
                'og_description',
                'og_image',
                'canonical_url',
            ]);
        });
    }
};