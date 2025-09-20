<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('client_type', ['individual', 'legal'])->nullable()->after('email');
            $table->string('phone')->nullable()->after('client_type');
            $table->string('unp')->nullable()->after('phone');
            $table->string('company_name')->nullable()->after('unp');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['client_type', 'phone', 'unp', 'company_name']);
        });
    }
};
