@extends('layouts.tall')
@section('content')



    <header>
        <meta name="description" content="Краткое описание вашей страницы.">
        <meta name="keywords" content="ключевое, слово, разделенное, запятыми">
    </header> <!-- Добавить SEO-->

    <main>
        <div class = "p-6 ">
            <h1 class="text-3xl font-semibold"> {{ $product->name }} </h1>
        </div>

        <!-- Основная информация о продукте -->
        <section class="rounded-lg bg-neutral-50 shadow-lg p-10 max-w-[95%] mx-auto mb-8 fade-in">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-stretch">
                <!-- Блок с изображениями продукта -->
                <div class="flex justify-center items-center shadow-2xl hover-lift bg-white p-3 rounded-2xl h-full">
                    <div class="relative w-full max-w-md">
                        <!-- Главное изображение -->
                        <div class="relative overflow-hidden rounded-lg shadow-lg bg-gray-50 p-2 mb-4">
                            <a href="{{ $product->main_image_url }}" class="block h-80 rounded-md overflow-hidden" id="main-image-link">
                                <img src="{{ $product->main_image_url }}" 
                                     alt="{{ $product->name }}"
                                     class="w-full h-full object-cover object-center transition-all duration-500 hover:scale-105"
                                     id="main-image">
                            </a>
                        </div>
                        
                        <!-- Миниатюры изображений -->
                        @if($product->hasAdditionalImages() || $product->images->count() > 1)
                        <div class="grid grid-cols-3 gap-3">
                            @foreach($product->getAllImagesOrdered() as $index => $image)
                                <div class="relative group cursor-pointer transition-all duration-300 {{ $index === 0 ? 'ring-2 ring-red-500 ring-offset-1' : 'hover:ring-2 hover:ring-red-300 hover:ring-offset-1' }}"
                                     onclick="changeMainImage('{{ $image->image_url }}', '{{ $image->alt_text ?: $product->name }}')">
                                    <div class="aspect-square rounded-lg overflow-hidden shadow-md group-hover:shadow-lg transition-all duration-300">
                                        <img src="{{ $image->image_url }}" 
                                             alt="{{ $image->alt_text ?: $product->name }}"
                                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @elseif($product->picture)
                        <!-- Обратная совместимость - показываем старое изображение -->
                        <div class="grid grid-cols-3 gap-3">
                            <div class="relative ring-2 ring-red-500 ring-offset-1">
                                <div class="aspect-square rounded-lg overflow-hidden shadow-md">
                                    <img src="{{ asset('storage/' . $product->picture) }}" 
                                         alt="{{ $product->name }}"
                                         class="w-full h-full object-cover">
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Блок с опциями покупки -->
                <div class="shadow-2xl hover-lift bg-white p-6 rounded-2xl h-full">
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

                    <!-- Кнопка добавления в корзину -->
                    <div class="mt-6">
                        <button onclick="addToCart()" 
                                class="w-full bg-red-600 text-white py-4 px-6 rounded-lg font-semibold text-lg hover:bg-red-700 transition-all duration-300 flex items-center justify-center space-x-3 shadow-lg hover:shadow-xl">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                            </svg>
                            <span>В КОРЗИНУ</span>
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Нижний блок с описанием -->
        <section class="rounded-lg bg-neutral-50 shadow-lg p-6 max-w-[70%] mx-auto mt-10 fade-in">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Описание продукта</h2>
                <p class="text-xl text-gray-700 max-w-3xl mx-auto">Подробная информация о товаре</p>
            </div>
        </section>

        <section class="rounded-lg bg-neutral-50 shadow-lg p-10 max-w-[95%] mx-auto mt-10 fade-in">
          <div class="bg-white rounded-lg shadow-lg p-6 border border-gray-100">
                <div class="prose prose-lg max-w-none">
                    <div class="text-gray-600 leading-relaxed">
                        {!! $product->description !!}
                    </div>
                </div>
            </div>
        </section>

        <section class="rounded-lg bg-neutral-50 shadow-lg p-6 max-w-[70%] mx-auto mt-10 fade-in">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Часто задаваемые вопросы</h2>
                <p class="text-xl text-gray-700 max-w-3xl mx-auto">Здесь вы найдете всю необходимую информацию о продукте</p>
            </div>
        </section>
        
        <aside class="rounded-lg bg-neutral-50 shadow-lg p-4 max-w-[95%] mx-auto mt-10 fade-in section-shadow">
            @if($faqs && $faqs->count() > 0)
                @foreach($faqs as $faq)
                    <div class="collapse bg-base-100 border-base-300 border mt-2">
                        <input type="checkbox"/>
                        <div class="collapse-title font-semibold text-gray-700 hover:text-cyan-700 transition-colors">
                            {{ $faq->question }}
                        </div>
                        <div class="collapse-content text-sm text-gray-600">
                            <p>{{ $faq->answer }}</p>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="text-center py-8">
                    <p class="text-gray-500">Часто задаваемые вопросы пока не добавлены.</p>
                </div>
            @endif
        </aside>

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
        
        // Функция для добавления товара в корзину
        function addToCart() {
            const productId = {{ $product->id }};
            const selectedSize = document.getElementById('sizes-dropdown').value;
            const quantity = parseInt(document.getElementById('quantity').value);
            
            // Показываем индикатор загрузки
            const button = event.target;
            const originalText = button.innerHTML;
            button.innerHTML = '<span class="animate-spin">⏳</span> Добавление...';
            button.disabled = true;
            
            // Создаем FormData вместо JSON
            const formData = new FormData();
            formData.append('product_id', productId);
            formData.append('size', selectedSize);
            formData.append('quantity', quantity);
            formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
            
            fetch('/cart/add', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                // Если статус 200-299, считаем успешным
                if (response.status >= 200 && response.status < 300) {
                    // Показываем успешное сообщение
                    button.innerHTML = '<span class="text-green-400">✓</span> Добавлено!';
                    button.classList.remove('bg-red-600', 'hover:bg-red-700');
                    button.classList.add('bg-green-600');
                    
                    // Возвращаем кнопку в исходное состояние через 2 секунды
                    setTimeout(() => {
                        button.innerHTML = originalText;
                        button.classList.remove('bg-green-600');
                        button.classList.add('bg-red-600', 'hover:bg-red-700');
                        button.disabled = false;
                    }, 2000);
                } else {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                // Показываем ошибку
                button.innerHTML = '<span class="text-red-400">✗</span> Ошибка';
                button.classList.remove('bg-red-600', 'hover:bg-red-700');
                button.classList.add('bg-red-800');
                
                // Возвращаем кнопку в исходное состояние через 2 секунды
                setTimeout(() => {
                    button.innerHTML = originalText;
                    button.classList.remove('bg-red-800');
                    button.classList.add('bg-red-600', 'hover:bg-red-700');
                    button.disabled = false;
                }, 2000);
            });
        }
    </script>


@endsection
