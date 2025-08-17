@extends('layouts.tall')
@section('content')



    <header>
        <meta name="description" content="Краткое описание вашей страницы.">
        <meta name="keywords" content="ключевое, слово, разделенное, запятыми">
    </header> <!-- Добавить SEO-->

    <main class="py-8">

        <!-- Основная информация о продукте -->
        <article class="max-w-[95%] mx-auto mb-8">
            <div class="flex flex-col lg:flex-row gap-8">
                
                <!-- Левая панель - Изображение продукта -->
                <div class="w-full lg:w-1/2">
                    <div class="relative">
                        <!-- Главное изображение -->
                        <figure class="relative overflow-hidden rounded-lg shadow-lg bg-white p-4">
                            <a href="{{ asset('storage/' . $product->picture) }}" class="block">
                                <img src="{{ asset('storage/' . $product->picture) }}" 
                                     alt="{{ $product->name }}"
                                     class="w-full h-96 object-cover object-center img-hover transition-all duration-300">
                            </a>
                        </figure>
                        
                        <!-- Миниатюры (заглушка для будущих изображений) -->
                        <div class="flex space-x-2 mt-4">
                            <div class="w-16 h-16 border-2 border-cyan-600 rounded-lg overflow-hidden">
                                <img src=" 
                                     alt=""
                                     class="w-full h-full object-cover">
                            </div>
                                                         <div class="w-16 h-16 border border-gray-300 rounded-lg overflow-hidden">
                                <img src="" 
                                     alt=""
                                     class="w-full h-full object-cover">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Правая панель - Опции покупки -->
                <div class="w-full lg:w-1/2">
                    <div class="bg-white rounded-lg shadow-lg p-6 border border-gray-100">
                        
                        <!-- Название продукта -->
                        <h1 class="text-2xl lg:text-3xl font-bold text-gray-800 mb-4">
                            {{ $product->name }}
                        </h1>

                        <!-- Цена -->
                        <div class="mb-6">
                            <div class="text-3xl font-bold text-red-600 mb-1">
                                {{ number_format((float)$product->price, 0, ',', ' ') }} BY
                            </div>
                            <div class="text-sm text-gray-600">За 1 шт.</div>
                        </div>

                        <!-- Выбор размера -->
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-gray-800 mb-3">Размер</h3>
                            <select id="sizes-dropdown" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-all duration-200 bg-white">
                                @foreach($size_arr as $size)
                                    <option value="{{ $size }}">{{ $size }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Выбор количества и итоговая сумма -->
                        <div class="mb-6">
                            <div class="flex items-center justify-between mb-3">
                                <span class="text-sm text-gray-600">В количестве на</span>
                                
                            </div>
                            <div class="flex items-center space-x-3">
                                <button id="decrease-quantity" class="w-10 h-10 border border-gray-300 rounded-lg flex items-center justify-center hover:bg-cyan-50 hover:border-cyan-600 transition-all duration-200">
                                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                                    </svg>
                                </button>
                                <input type="number" id="quantity" min="1" value="1" 
                                       class="w-20 text-center p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-all duration-200 [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none">
                                <button id="increase-quantity" class="w-10 h-10 border border-gray-300 rounded-lg flex items-center justify-center hover:bg-cyan-50 hover:border-cyan-600 transition-all duration-200">
                                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                    </svg>
                                </button>
                            </div>
                            
                        </div>

                        <!-- Кнопка добавления в корзину -->
                        <div class="mb-4">
                            <a href="/cart/add/{{ $product->id }}" 
                               class="w-full bg-red-600 text-white py-4 px-6 rounded-lg font-semibold text-lg hover:bg-red-700 transition-all duration-300 flex items-center justify-center space-x-3 shadow-lg hover:shadow-xl">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                </svg>
                                <span>В КОРЗИНУ</span>
                            </a>
                        </div>

                        
                    </div>
                </div>
            </div>
        </article>

        <!-- Нижний блок с описанием -->
        <aside class="max-w-[95%] mx-auto">
            <div class="bg-white rounded-lg shadow-lg p-6 border border-gray-100">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Описание </h2>
                <div class="prose prose-lg max-w-none">
                    <div class="text-gray-600 leading-relaxed">
                        {!! $product->description !!}
                    </div>
                </div>
            </div>
        </aside>

    </main>

    <!-- JavaScript для функциональности -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const quantityInput = document.getElementById('quantity');
            const decreaseBtn = document.getElementById('decrease-quantity');
            const increaseBtn = document.getElementById('increase-quantity');
            const basePrice = {{ (float)$product->price }};
            
            function updateTotal() {
                const quantity = parseInt(quantityInput.value);
                const total = basePrice * quantity;
                // Обновляем отображение суммы
                const totalElement = document.querySelector('.text-lg.font-semibold.text-gray-800');
                if (totalElement) {
                    totalElement.textContent = 'сумму ' + total.toLocaleString('ru-RU') + ' BY';
                }
            }
            
            decreaseBtn.addEventListener('click', function() {
                if (quantityInput.value > 1) {
                    quantityInput.value = parseInt(quantityInput.value) - 1;
                    updateTotal();
                }
            });
            
            increaseBtn.addEventListener('click', function() {
                quantityInput.value = parseInt(quantityInput.value) + 1;
                updateTotal();
            });
            
            quantityInput.addEventListener('input', updateTotal);
        });
    </script>

@endsection
