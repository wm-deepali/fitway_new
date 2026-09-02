<?php
// database/migrations/2026_08_31_000000_add_requirements_and_details_to_setup_my_gyms_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('setup_my_gyms', function (Blueprint $table) {
            $table->json('requirements')->nullable()->after('mobile_number');
            $table->text('details')->nullable()->after('requirements');
        });
    }

    public function down(): void
    {
        Schema::table('setup_my_gyms', function (Blueprint $table) {
            $table->dropColumn(['requirements', 'details']);
        });
    }
};