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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string( column: 'name')->nullable();
            $table->text(column: 'description')->nullable();
            $table->string(column: 'price')->nullable();
            $table->string(column: 'size')->nullable();
            $table->string(column: 'picture')->nullable();
            $table->unsignedInteger(column: 'catalog_id')->nullable();
            $table->unsignedInteger(column: 'user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
