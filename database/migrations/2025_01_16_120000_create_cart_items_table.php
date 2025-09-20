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
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->string('session_id')->nullable(); // Для неавторизованных пользователей
            $table->unsignedBigInteger('user_id')->nullable(); // Для авторизованных пользователей
            $table->unsignedBigInteger('product_id');
            $table->string('size')->nullable(); // Размер товара
            $table->decimal('price', 10, 2); // Цена на момент добавления
            $table->integer('quantity')->default(1);
            $table->timestamps();
            
            // Индексы для оптимизации
            $table->index(['session_id']);
            $table->index(['user_id']);
            $table->index(['product_id']);
            
            // Внешние ключи
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            
            // Уникальность: один товар одного размера на пользователя/сессию
            $table->unique(['session_id', 'product_id', 'size'], 'unique_session_product_size');
            $table->unique(['user_id', 'product_id', 'size'], 'unique_user_product_size');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
