<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('whatsapp_number', 15)->nullable()->after('contact');
            $table->text('address')->nullable()->after('whatsapp_number');
            $table->boolean('status')->default(true)->after('address');
            $table->boolean('is_sub_admin')->default(false)->after('status'); // existing admin stays false = super admin
            $table->json('permissions')->nullable()->after('is_sub_admin');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['whatsapp_number', 'address', 'status', 'is_sub_admin', 'permissions']);
        });
    }
};