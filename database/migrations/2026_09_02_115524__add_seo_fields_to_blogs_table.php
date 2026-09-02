<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->string('meta_title')->nullable()->after('slug');
            $table->string('h1')->nullable()->after('meta_title');
            $table->text('meta_description')->nullable()->after('h1');
            $table->string('canonical_url')->nullable()->after('meta_description');
            $table->string('og_title')->nullable()->after('canonical_url');
            $table->text('og_description')->nullable()->after('og_title');
            $table->string('og_image')->nullable()->after('og_description');
        });
    }

    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn([
                'meta_title',
                'h1',
                'meta_description',
                'canonical_url',
                'og_title',
                'og_description',
                'og_image',
            ]);
        });
    }
};