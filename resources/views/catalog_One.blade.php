@extends('layouts.tall')
@section('content')

    <header>
        <meta name="description" content="Краткое описание вашей страницы.">
        <meta name="keywords" content="ключевое, слово, разделенное, запятыми">
    </header> <!-- Сделать SEO-->

    <main>
    <div class = "p-6 ">
            <h1 class="text-3xl font-semibold"> {{ $catalog->name }} </h1>
        </div>

        <section class="rounded-lg bg-neutral-50 shadow-lg  max-w-[95%] mx-auto  fade-in section-shadow">

            <div class="ml-4 w-full lg:w-1/2  ">
                <h2 class="text-3xl font-semibold text-fade-in">
                    @if($catalog->parent)
                        <a href="/catalog/{{$catalog->parent->id}}"
                           class="block py-2 px-4 rounded-md hover:bg-gray-200 active-link"
                           data-section="section1">{{$catalog->parent->name}} </a>
                    @endif
                    {{$catalog->name}}</h2>
            </div>
            <div class="container mx-auto px-4 py-8 flex flex-col md:flex-row  ">
                <aside class="w-full md:w-1/4 bg-gradient-to-br from-white via-gray-50 to-gray-100 rounded-xl p-6 mb-4 md:mb-0 md:mr-4 shadow-lg border border-gray-200 sticky top-4 h-fit">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-xl font-bold text-gray-800 flex items-center gap-2">
                            <svg class="w-6 h-6 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                            </svg>
                            Фильтр
                        </h3>
                        <button type="button" 
                                id="resetFilters" 
                                class="reset-filters-btn hidden text-xs font-medium text-cyan-600 hover:text-cyan-700 transition-colors duration-200 flex items-center gap-1 px-3 py-1 rounded-lg hover:bg-cyan-50"
                                title="Сбросить фильтры">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            Сбросить
                        </button>
                    </div>
                    
                    @if($tags && $tags->count() > 0)
                        <div class="mb-4">
                            <div class="flex items-center justify-between mb-4">
                                <h4 class="text-sm font-semibold text-gray-700 uppercase tracking-wide flex items-center gap-2">
                                    <svg class="w-4 h-4 text-cyan-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                    </svg>
                                    Метки
                                </h4>
                                <span id="filterCount" class="text-xs font-medium text-gray-500 hidden"></span>
                            </div>
                            <div class="flex flex-wrap gap-2.5">
                                @foreach($tags as $tag)
                                    <button type="button" 
                                            class="filter-tag group relative inline-flex items-center gap-1.5 px-4 py-2 rounded-full text-sm font-medium shadow-sm hover:shadow-lg transition-all duration-300 transform hover:scale-105 border-2 border-transparent opacity-60 hover:opacity-100 active:scale-95"
                                            style="background: linear-gradient(135deg, {{ $tag->color ?? '#3B82F6' }} 0%, {{ $tag->color ?? '#3B82F6' }}dd 100%); color: white;"
                                            data-tag-id="{{ $tag->id }}">
                                        <span class="filter-tag-text">{{ $tag->name }}</span>
                                        <svg class="filter-tag-check w-4 h-4 opacity-0 transform rotate-[-90deg] transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div class="text-center py-8 text-gray-400">
                            <svg class="w-12 h-12 mx-auto mb-2 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                            </svg>
                            <p class="text-sm">Нет доступных фильтров</p>
                        </div>
                    @endif
                </aside><!-- Фильтр -->
                <div class="container mx-auto ">
                    
                    <article class="w-full">
                        @if($catalog->products && count($catalog->products) > 0)
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                @foreach($catalog->products as $product)
                                    <div class="bg-white rounded-lg shadow-md overflow-hidden card-hover hover-lift product-card" data-product-tags="{{ $product->tags && $product->tags->count() > 0 ? $product->tags->pluck('id')->implode(',') : '' }}">
                                        <a href="/product/{{$product->id}}" class="relative block">
                                            <img src="{{ $product->main_image_url ?? asset('storage/' . $product->picture) ?? asset('pictures/fon.png') }}"
                                                 alt="{{ $product->name }}"
                                                 class="w-full h-48 object-cover object-center img-hover">
                                            <!-- Метки товара на изображении -->
                                            @if($product->tags && $product->tags->count() > 0)
                                                <div class="absolute top-2 right-2 flex flex-wrap gap-1 justify-end">
                                                    @foreach($product->tags->take(3) as $tag)
                                                        <div class="inline-flex items-center gap-1 px-2 py-1 rounded-full text-xs font-medium shadow-md"
                                                             style="background-color: {{ $tag->color ?? '#3B82F6' }}; color: white;">
                                                            <span>{{ $tag->name }}</span>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </a>
                                        <div class="p-4">
                                            <h3 class="text-base font-medium">
                                                <a href="/product/{{$product->id}}"
                                                   class="hover:text-cyan-700 transition duration-200">{{ $product->name }}</a>
                                            </h3>
                                            @if($product->price)
                                                <div class="mt-2">
                                                    <span class="text-lg font-bold text-cyan-700">{{ $product->getFormattedFirstPrice() }}</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="bg-white rounded-md p-6 shadow-md">
                                <p class="text-gray-500">В этой категории нет товаров.</p>
                            </div>
                        @endif
                    </article>
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

    <style>
        /* Стили для тегов фильтра */
        .filter-tag {
            overflow: hidden;
        }

        /* Стили для активного состояния тега */
        .filter-tag.active {
            opacity: 1 !important;
            border-color: rgba(255, 255, 255, 0.8) !important;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.25), 0 0 0 2px rgba(255, 255, 255, 0.5) !important;
        }

        .filter-tag.active .filter-tag-check {
            opacity: 1 !important;
            transform: rotate(0deg) !important;
        }

        .filter-tag.active .filter-tag-text {
            font-weight: 600;
        }

        /* Анимация пульсации для активных тегов */
        .filter-tag.active::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.4);
            transform: translate(-50%, -50%);
            animation: pulse 0.6s ease-out;
            pointer-events: none;
        }

        @keyframes pulse {
            0% {
                width: 0;
                height: 0;
                opacity: 0.6;
            }
            100% {
                width: 120px;
                height: 120px;
                opacity: 0;
            }
        }
        
        /* Улучшенные эффекты при наведении */
        .filter-tag:hover {
            transform: scale(1.08) translateY(-2px);
        }
        
        .filter-tag.active:hover {
            transform: scale(1.1) translateY(-2px);
        }

        /* Стили для кнопки сброса */
        .reset-filters-btn {
            transition: all 0.3s ease;
        }

        .reset-filters-btn:hover {
            transform: translateY(-1px);
        }

        /* Плавное появление/исчезновение товаров */
        .product-card {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .product-card.hidden {
            opacity: 0;
            transform: scale(0.95);
            pointer-events: none;
        }

        /* Стили для счетчика фильтров */
        #filterCount {
            background: linear-gradient(135deg, #0891b2 0%, #0e7490 100%);
            color: white;
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 600;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterTags = document.querySelectorAll('.filter-tag');
            const productCards = document.querySelectorAll('.product-card');
            const resetFiltersBtn = document.getElementById('resetFilters');
            const filterCount = document.getElementById('filterCount');
            let activeFilters = [];

            // Обработка клика по тегу фильтра
            filterTags.forEach(tag => {
                tag.addEventListener('click', function() {
                    const tagId = this.getAttribute('data-tag-id');
                    const index = activeFilters.indexOf(tagId);

                    // Переключаем состояние фильтра
                    if (index > -1) {
                        // Убираем фильтр
                        activeFilters.splice(index, 1);
                        this.classList.remove('active');
                        this.style.opacity = '0.6';
                    } else {
                        // Добавляем фильтр
                        activeFilters.push(tagId);
                        this.classList.add('active');
                        this.style.opacity = '1';
                    }

                    // Обновляем UI и фильтруем товары
                    updateFilterUI();
                    filterProducts();
                });
            });

            // Обработка кнопки сброса фильтров
            if (resetFiltersBtn) {
                resetFiltersBtn.addEventListener('click', function() {
                    // Сбрасываем все фильтры
                    activeFilters = [];
                    filterTags.forEach(tag => {
                        tag.classList.remove('active');
                        tag.style.opacity = '0.6';
                    });
                    
                    // Обновляем UI и показываем все товары
                    updateFilterUI();
                    filterProducts();
                });
            }

            // Обновление UI фильтров
            function updateFilterUI() {
                // Показываем/скрываем кнопку сброса и счетчик
                if (activeFilters.length > 0) {
                    resetFiltersBtn?.classList.remove('hidden');
                    filterCount?.classList.remove('hidden');
                    filterCount.textContent = `Выбрано: ${activeFilters.length}`;
                } else {
                    resetFiltersBtn?.classList.add('hidden');
                    filterCount?.classList.add('hidden');
                }
            }

            // Функция фильтрации товаров
            function filterProducts() {
                if (activeFilters.length === 0) {
                    // Если фильтры не выбраны, показываем все товары
                    productCards.forEach((card, index) => {
                        setTimeout(() => {
                            card.style.display = '';
                            card.classList.remove('hidden');
                        }, index * 30); // Плавное появление с задержкой
                    });
                } else {
                    // Фильтруем по выбранным тегам
                    let visibleCount = 0;
                    productCards.forEach((card, index) => {
                        const productTags = card.getAttribute('data-product-tags');
                        if (!productTags) {
                            card.classList.add('hidden');
                            return;
                        }

                        const productTagIds = productTags.split(',').map(id => id.trim()).filter(id => id);
                        const hasMatchingTag = activeFilters.some(filterTagId => 
                            productTagIds.includes(filterTagId)
                        );

                        if (hasMatchingTag) {
                            setTimeout(() => {
                                card.style.display = '';
                                card.classList.remove('hidden');
                            }, visibleCount * 30); // Плавное появление с задержкой
                            visibleCount++;
                        } else {
                            card.classList.add('hidden');
                        }
                    });
                }
            }
        });
    </script>

@endsection
