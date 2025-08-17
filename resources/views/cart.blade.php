@extends('layouts.tall')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold text-gray-800 mb-8 text-fade-in">Корзина</h1>
        
        <!-- Пустая корзина -->
        <div class="bg-white rounded-lg shadow-md p-8 text-center fade-in card-hover">
            <svg class="mx-auto h-16 w-16 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5M7 13l2.5 5m6-5v6a2 2 0 01-2 2H9a2 2 0 01-2-2v-6m6 0V9a2 2 0 00-2-2H9a2 2 0 00-2 2v4.01"></path>
            </svg>
            <h2 class="text-xl font-semibold text-gray-600 mb-2">Ваша корзина пуста</h2>
            <p class="text-gray-500 mb-6">Добавьте товары из каталога, чтобы начать покупки</p>
            <a href="/" class="btn bg-cyan-700 hover:bg-cyan-800 text-white btn-animate ripple">
                Перейти в каталог
            </a>
        </div>
        
        <!-- Здесь будет содержимое корзины, когда она не пуста -->
        <!-- 
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-800">Товары в корзине</h2>
            </div>
            <div class="divide-y divide-gray-200">
                <!-- Товары корзины -->
            </div>
            <div class="px-6 py-4 bg-gray-50">
                <div class="flex justify-between items-center">
                    <span class="text-lg font-semibold">Итого:</span>
                    <span class="text-2xl font-bold text-cyan-700">0 ₽</span>
                </div>
                <button class="btn bg-cyan-700 hover:bg-cyan-800 text-white w-full mt-4">
                    Оформить заказ
                </button>
            </div>
        </div>
        -->
    </div>
</div>
@endsection 