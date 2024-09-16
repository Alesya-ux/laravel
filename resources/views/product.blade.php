@extends('layouts.tall')
@section('content')



    <header>
        <meta name="description" content="Краткое описание вашей страницы.">
        <meta name="keywords" content="ключевое, слово, разделенное, запятыми">
    </header> <!-- Добавить SEO-->

    <main class="py-8">

        <!-- Основная информация о продукте -->
        <article class="max-w-[95%] mx-auto mb-8">
            <div class="flex flex-col lg:flex-row gap-8 min-h-[600px]">
                
                <!-- Левая панель - Изображение продукта -->
                <div class="w-full lg:w-1/2 flex flex-col">
                    <div class="relative flex-1 flex flex-col">
                        <!-- Главное изображение -->
                        <figure class="relative overflow-hidden rounded-lg shadow-lg bg-white p-4 h-96">
                            <a href="{{ $product->main_image_url }}" class="block h-full" id="main-image-link">
                                <img src="{{ $product->main_image_url }}" 
                                     alt="{{ $product->name }}"
                                     class="w-full h-full object-cover object-center img-hover transition-all duration-300"
                                     id="main-image">
                            </a>
                        </figure>
                        
                        <!-- Миниатюры изображений -->
                        @if($product->hasAdditionalImages() || $product->images->count() > 1)
                        <div class="flex space-x-2 mt-4 overflow-x-auto">
                            @foreach($product->getAllImagesOrdered() as $index => $image)
                                <div class="w-16 h-16 border-2 rounded-lg overflow-hidden cursor-pointer transition-all duration-200 {{ $index === 0 ? 'border-red-600' : 'border-gray-300 hover:border-red-400' }}"
                                     onclick="changeMainImage('{{ $image->image_url }}', '{{ $image->alt_text ?: $product->name }}')">
                                    <img src="{{ $image->image_url }}" 
                                         alt="{{ $image->alt_text ?: $product->name }}"
                                         class="w-full h-full object-cover">
                                </div>
                            @endforeach
                        </div>
                        @elseif($product->picture)
                        <!-- Обратная совместимость - показываем старое изображение -->
                        <div class="flex space-x-2 mt-4">
                            <div class="w-16 h-16 border-2 border-red-600 rounded-lg overflow-hidden">
                                <img src="{{ asset('storage/' . $product->picture) }}" 
                                     alt="{{ $product->name }}"
                                     class="w-full h-full object-cover">
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Правая панель - Опции покупки -->
                <div class="w-full lg:w-1/2 flex flex-col">
                    <div class="bg-white rounded-lg shadow-lg p-6 border border-gray-100 flex flex-col justify-between h-full">
                        
                        <!-- Верхний блок - Информация о товаре -->
                        <div class="flex-1">
                            <!-- Название продукта -->
                            <h1 class="text-2xl lg:text-3xl font-bold text-gray-800 mb-4">
                                {{ $product->name }}
                            </h1>

                            <!-- Цена -->
                            <div class="mb-6">
                                <div class="text-3xl font-bold text-red-600 mb-1" id="current-price">
                                    @if(count($sizes_with_prices) > 0)
                                        {{ number_format(array_values($sizes_with_prices)[0], 2, ',', ' ') }} руб
                                    @else
                                        {{ $product->formatted_price }}
                                    @endif
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
                                <span class="text-sm text-gray-600">В количестве</span>
                                
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
                            
                            <!-- Итоговая сумма -->
                            <div class="mt-4 p-4 bg-gray-50 rounded-lg">
                                <div class="text-lg font-semibold text-gray-800" id="total-amount">
                                    Итого: 0 BY
                                </div>
                            </div>
                        </div>
                        </div>

                        <!-- Нижний блок - Кнопка добавления в корзину -->
                        <div class="mt-6">
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
        <aside class="rounded-lg bg-neutral-50 shadow-lg p-4 max-w-[95%] mx-auto mt-10 fade-in section-shadow">
            <div class="collapse bg-base-100 border-base-300 border mt-2 ">
                <input type="checkbox"/>
                <div class="collapse-title font-semibold">?</div>
                <div class="collapse-content text-sm">
                    Click the "Sign Up" button in the top right corner and follow the registration process.
                </div>
            </div>
            <div class="collapse bg-base-100 border-base-300 border mt-2 ">
                <input type="checkbox"/>
                <div class="collapse-title font-semibold">?</div>
                <div class="collapse-content text-sm">
                    Click the "Sign Up" button in the top right corner and follow the registration process.
                </div>
            </div>
        </aside><!-- Добавить блок для вопросов -->

    </main>

    <!-- JavaScript для функциональности -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const quantityInput = document.getElementById('quantity');
            const decreaseBtn = document.getElementById('decrease-quantity');
            const increaseBtn = document.getElementById('increase-quantity');
            const sizesDropdown = document.getElementById('sizes-dropdown');
            const currentPriceElement = document.getElementById('current-price');
            
            // Данные о ценах по размерам
            const sizesWithPrices = @json($sizes_with_prices);
            
            // Функция для обновления цены при смене размера
            function updatePrice() {
                const selectedSize = sizesDropdown.value;
                if (sizesWithPrices[selectedSize]) {
                    const price = parseFloat(sizesWithPrices[selectedSize]);
                    currentPriceElement.textContent = price.toLocaleString('ru-RU', {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                    }) + ' руб';
                    updateTotal();
                }
            }
            
            // Функция для обновления общей суммы
            function updateTotal() {
                const selectedSize = sizesDropdown.value;
                const quantity = parseInt(quantityInput.value);
                
                if (sizesWithPrices[selectedSize]) {
                    const price = parseFloat(sizesWithPrices[selectedSize]);
                    const total = price * quantity;
                    
                    // Обновляем отображение итоговой суммы
                    const totalElement = document.getElementById('total-amount');
                    if (totalElement) {
                        totalElement.textContent = 'Итого: ' + total.toLocaleString('ru-RU', {
                            minimumFractionDigits: 2,
                            maximumFractionDigits: 2
                        }) + ' BY';
                    }
                }
            }
            
            // Обработчики событий для кнопок количества
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
            
            // Обработчики событий
            quantityInput.addEventListener('input', updateTotal);
            sizesDropdown.addEventListener('change', updatePrice);
            
            // Инициализация при загрузке страницы
            updateTotal();
        });
        
        // Функция для смены главного изображения
        function changeMainImage(imageUrl, altText) {
            const mainImage = document.getElementById('main-image');
            const mainImageLink = document.getElementById('main-image-link');
            
            if (mainImage && mainImageLink) {
                mainImage.src = imageUrl;
                mainImage.alt = altText;
                mainImageLink.href = imageUrl;
                
                // Обновляем активную миниатюру
                document.querySelectorAll('.w-16.h-16').forEach(thumb => {
                    thumb.classList.remove('border-red-600');
                    thumb.classList.add('border-gray-300');
                });
                
                event.target.closest('.w-16.h-16').classList.remove('border-gray-300');
                event.target.closest('.w-16.h-16').classList.add('border-red-600');
            }
        }
    </script>

@endsection
