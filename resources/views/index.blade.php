
@extends('layouts.tall')
@section('content')

<style>
/* Карусель */
.carousel-item {
    transition: opacity 0.5s ease-in-out;
    opacity: 0;
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

.carousel-item.active {
    opacity: 1;
    position: relative;
}

.carousel-container {
    position: relative;
    height: 450px;
    overflow: hidden;
}

.carousel-nav-btn {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 20;
    background-color: rgba(255, 255, 255, 0.8);
    border: none;
    border-radius: 50%;
    width: 50px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.carousel-nav-btn:hover {
    background-color: white;
}

.carousel-nav-btn.prev {
    left: 20px;
}

.carousel-nav-btn.next {
    right: 20px;
}

.carousel-nav-btn:disabled {
    opacity: 0.5;
    cursor: not-allowed;
}

/* Анимация смены изображений для блока "О нас" */
.image-slide {
    transition: opacity 0.5s ease-in-out;
}

@keyframes imageCycle1 {
    0%, 15% { opacity: 1; } /* 0-1.8 секунды - первая картинка */
    20%, 80% { opacity: 0; } /* 2.4-9.6 секунды - скрыта */
    85%, 100% { opacity: 1; } /* 10.2-12 секунды - первая картинка */
}

@keyframes imageCycle2 {
    0%, 15% { opacity: 0; } /* 0-1.8 секунды - скрыта */
    20%, 30% { opacity: 1; } /* 2.4-3.6 секунды - вторая картинка */
    35%, 80% { opacity: 0; } /* 4.2-9.6 секунды - скрыта */
    85%, 100% { opacity: 0; } /* 10.2-12 секунды - скрыта */
}

@keyframes imageCycle3 {
    0%, 30% { opacity: 0; } /* 0-3.6 секунды - скрыта */
    35%, 50% { opacity: 1; } /* 4.2-6 секунды - третья картинка */
    55%, 100% { opacity: 0; } /* 6.6-12 секунды - скрыта */
}
</style>

    <main>
        <section class="rounded-lg bg-neutral-50 shadow-lg p-4 max-w-[95%] mx-auto mt-10 fade-in">
            <div class="carousel-container w-full" id="mainCarousel">
                <!-- Слайд 1: АДЕНТИНА СЕРВИС -->
                <div id="slide1" class="carousel-item active">
                    <div class="hero relative overflow-hidden h-full">
                        <div class="hero-bg absolute top-0 left-0 w-full h-full z-0"
                             style="background-image: url('/pictures/glavnaya/1.png'); background-size: cover; background-position: center; opacity: 0.2;"></div>
                        <div class="hero-content flex-col lg:flex-row-reverse relative z-10 ">
                            <div class="px-20">
                                <h1 class="text-7xl font-bold text-gray-800 ">Профессиональные дезинфицирующие средства и оборудование</h1>
                                
                                <div class="flex justify-end">
                                    <a href="/catalog" class="btn bg-[#F44336] hover:bg-[#D32F2F] text-white animate-pulse shadow-lg px-4 py-2 text-sm font-semibold">Каталог</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Слайд 2: Дезинфицирующее оборудование -->
                <div id="slide2" class="carousel-item">
                    <div class="hero relative overflow-hidden h-full">
                        <div class="hero-bg absolute top-0 left-0 w-full h-full z-0"
                             style="background-image: url('/pictures/glavnaya/2.jpg'); background-size: cover; background-position: center; opacity: 0.2;"></div>
                        <div class="hero-content flex-col lg:flex-row-reverse relative z-10">
                            <div class="">
                                <h1 class="text-7xl font-bold text-gray-800">Дезинфицирующее оборудование</h1>
                                <p class="py-4 text-2xl font-semibold text-gray-700">
                                    Профессиональные решения для дезинфекции: от портативных устройств до промышленных систем!
                                </p>
                                <div class="flex justify-end">
                                    <a href="/catalog/2" class="btn bg-[#F44336] hover:bg-[#D32F2F] text-white animate-pulse shadow-lg px-4 py-2 text-sm font-semibold">Узнать больше</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Слайд 3: Антибактериальные ковры -->
                <div id="slide3" class="carousel-item">
                    <div class="hero relative overflow-hidden h-full">
                        <div class="hero-bg absolute top-0 left-0 w-full h-full z-0"
                             style="background-image: url('/pictures/glavnaya/3.jpg'); background-size: cover; background-position: center; opacity: 0.2;"></div>
                        <div class="hero-content flex-col lg:flex-row-reverse relative z-10">
                            <div class="">
                                <h1 class="text-7xl font-bold text-gray-800">Антибактериальные ковры</h1>
                                <p class="py-4 text-2xl font-semibold text-gray-700">
                                    Инновационные ковры с антибактериальными свойствами для безопасной среды в вашем помещении!
                                </p>
                                <div class="flex justify-end">
                                    <a href="/catalog/1" class="btn bg-[#F44336] hover:bg-[#D32F2F] text-white animate-pulse shadow-lg px-4 py-2 text-sm font-semibold">Выбрать ковер</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Кнопки навигации -->
                <button class="carousel-nav-btn prev" id="prevBtn">❮</button>
                <button class="carousel-nav-btn next" id="nextBtn">❯</button>
            </div>
        </section>

        <!-- Блок "О нас" -->
        <section class="rounded-lg bg-neutral-50 shadow-lg p-6 max-w-[70%] mx-auto mt-10 fade-in">
            <div class="ml-4 w-full lg:w-1/2 mb-6">
                <h2 class="text-3xl font-semibold text-gray-800">О нас</h2>
            </div>

            <!-- Список преимуществ -->
            <div class="space-y-4">
                <!-- Преимущество 1: Лидерство на рынке -->
                <div class="group relative bg-white rounded-xl p-4 shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1 border-l-4 border-l-transparent hover:border-l-red-600">
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0">
                            <div class="w-14 h-14 bg-cyan-700 hover:bg-cyan-600 rounded-full flex items-center justify-center shadow-lg transition-all duration-300 hover:scale-110 cursor-pointer group-hover:shadow-2xl">
                                <svg class="w-7 h-7 text-white transition-transform duration-300 group-hover:scale-110" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-gray-800 mb-1 group-hover:text-red-600 transition-colors duration-300">Лидерство на рынке</h3>
                            <p class="text-gray-600 leading-relaxed group-hover:text-gray-700 transition-colors duration-300 text-sm">
                                Мы являемся первыми поставщиками дезинфицирующих средств и оборудования в Беларуси, что подтверждает нашу надежность и опыт.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Преимущество 2: Быстрое выставление счетов -->
                <div class="group relative bg-white rounded-xl p-4 shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1 border-l-4 border-l-transparent hover:border-l-red-600">
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0">
                            <div class="w-14 h-14 bg-cyan-700 hover:bg-cyan-600 rounded-full flex items-center justify-center shadow-lg transition-all duration-300 hover:scale-110 cursor-pointer group-hover:shadow-2xl">
                                <svg class="w-7 h-7 text-white transition-transform duration-300 group-hover:scale-110" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M3 3h18v18H3V3zm2 2v14h14V5H5zm3 3h8v2H8V8zm0 3h8v2H8v-2zm0 3h8v2H8v-2z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-gray-800 mb-1 group-hover:text-red-600 transition-colors duration-300">Быстрое выставление счетов</h3>
                            <p class="text-gray-600 leading-relaxed group-hover:text-gray-700 transition-colors duration-300 text-sm">
                                Мы выставляем счета в течение пары минут, что позволяет нашим клиентам оперативно получать необходимую продукцию.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Преимущество 3: Гибкая система цен -->
                <div class="group relative bg-white rounded-xl p-4 shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1 border-l-4 border-l-transparent hover:border-l-red-600">
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0">
                            <div class="w-14 h-14 bg-cyan-700 hover:bg-cyan-600 rounded-full flex items-center justify-center shadow-lg transition-all duration-300 hover:scale-110 cursor-pointer group-hover:shadow-2xl">
                                <svg class="w-7 h-7 text-white transition-transform duration-300 group-hover:scale-110" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2a10 10 0 00-10 10c0 5.52 4.48 10 10 10s10-4.48 10-10S17.52 2 12 2zm1 17h-2v-2h2v2zm0-4h-2V7h2v8z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-gray-800 mb-1 group-hover:text-red-600 transition-colors duration-300">Гибкая система цен</h3>
                            <p class="text-gray-600 leading-relaxed group-hover:text-gray-700 transition-colors duration-300 text-sm">
                                Мы предоставляем специальные условия и скидки в зависимости от объема закупаемой продукции, что позволяет нашим клиентам экономить на крупных заказах.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Преимущество 4: Сертифицированная продукция -->
                <div class="group relative bg-white rounded-xl p-4 shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1 border-l-4 border-l-transparent hover:border-l-red-600">
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0">
                            <div class="w-14 h-14 bg-cyan-700 hover:bg-cyan-600 rounded-full flex items-center justify-center shadow-lg transition-all duration-300 hover:scale-110 cursor-pointer group-hover:shadow-2xl">
                                <svg class="w-7 h-7 text-white transition-transform duration-300 group-hover:scale-110" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2L3 6v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V6l-9-4zm-2 16l-4-4 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-gray-800 mb-1 group-hover:text-red-600 transition-colors duration-300">Сертифицированная продукция</h3>
                            <p class="text-gray-600 leading-relaxed group-hover:text-gray-700 transition-colors duration-300 text-sm">
                                На весь ассортимент товаров имеются сертификаты и документы, подтверждающие качество и безопасность нашей продукции.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Преимущество 5: Индивидуальный подход -->
                <div class="group relative bg-white rounded-xl p-4 shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1 border-l-4 border-l-transparent hover:border-l-red-600">
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0">
                            <div class="w-14 h-14 bg-cyan-700 hover:bg-cyan-600 rounded-full flex items-center justify-center shadow-lg transition-all duration-300 hover:scale-110 cursor-pointer group-hover:shadow-2xl">
                                <svg class="w-7 h-7 text-white transition-transform duration-300 group-hover:scale-110" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-gray-800 mb-1 group-hover:text-red-600 transition-colors duration-300">Индивидуальный подход</h3>
                            <p class="text-gray-600 leading-relaxed group-hover:text-gray-700 transition-colors duration-300 text-sm">
                                Мы стремимся к созданию долгосрочных отношений с клиентами и готовы предложить индивидуальные решения для каждого из них.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="rounded-lg bg-neutral-50 max-w-[95%] mx-auto shadow-lg p-4 mt-10 fade-in">
            <div class="ml-4 w-full lg:w-1/2">
                <h2 class="text-3xl font-semibold text-gray-800">Каталог</h2>
            </div>
            
            <!-- Адаптивная карусель каталога -->
            <div class="relative mt-6">
                <!-- Контейнер карусели -->
                <div class="catalog-carousel overflow-hidden">
                    <div class="catalog-track flex transition-transform duration-500 ease-in-out" id="catalogTrack">
                        @foreach($catalogs as $catalog)
                            <div class="catalog-slide flex-shrink-0">
                                <div class="card bg-base-200 image-full shadow-lg hover-lift transition-all duration-300 group mx-2">
                                    <figure class="relative overflow-hidden">
                                        <img src="/storage/{{$catalog->picture}}" alt="{{$catalog->name}}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"/>
                                    </figure>
                                    <div class="card-body p-4">
                                        <h3 class="text-xl font-semibold text-white mb-2 line-clamp-2">{{$catalog->name}}</h3>
                                        <p class="text-sm text-gray-200 mb-4 line-clamp-3">{{$catalog->description}}</p>
                                        <div class="card-actions justify-end">
                                            <a href="/catalog/{{$catalog->id}}" class="btn btn-primary bg-cyan-700 hover:bg-cyan-600 text-white border-0 transition-all duration-300 hover:scale-105">
                                                Подробнее
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Карусель
    const carousel = document.getElementById('mainCarousel');
    const slides = carousel.querySelectorAll('.carousel-item');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    let currentSlide = 0;

    // Функция для переключения на конкретный слайд
    function goToSlide(slideIndex) {
        // Скрываем все слайды
        slides.forEach((slide, index) => {
            if (index === slideIndex) {
                slide.classList.add('active');
            } else {
                slide.classList.remove('active');
            }
        });
        
        currentSlide = slideIndex;
    }

    // Обработчики для кнопок навигации
    prevBtn.addEventListener('click', function(e) {
        e.preventDefault();
        const nextSlideIndex = (currentSlide - 1 + slides.length) % slides.length;
        goToSlide(nextSlideIndex);
    });

    nextBtn.addEventListener('click', function(e) {
        e.preventDefault();
        const nextSlideIndex = (currentSlide + 1) % slides.length;
        goToSlide(nextSlideIndex);
    });

    // Показываем первый слайд по умолчанию
    goToSlide(0);

    // ========================================
    // КАРУСЕЛЬ КАТАЛОГА
    // ========================================
    
    const catalogTrack = document.getElementById('catalogTrack');
    const catalogSlides = document.querySelectorAll('.catalog-slide');
    
    let currentCatalogSlide = 0;
    let slidesPerView = 5; // По умолчанию 5 позиций
    
    // Функция для определения количества видимых слайдов
    function updateSlidesPerView() {
        const width = window.innerWidth;
        if (width >= 1536) { // 2xl
            slidesPerView = 5;
        } else if (width >= 1280) { // xl
            slidesPerView = 4;
        } else if (width >= 1024) { // lg
            slidesPerView = 3;
        } else if (width >= 768) { // md
            slidesPerView = 2;
        } else { // sm и меньше
            slidesPerView = 1;
        }
    }
    
    // Функция для перехода к слайду каталога
    function goToCatalogSlide(slideIndex) {
        if (slideIndex < 0 || slideIndex >= Math.ceil(catalogSlides.length / slidesPerView)) {
            return;
        }
        
        currentCatalogSlide = slideIndex;
        const translateX = -(slideIndex * slidesPerView * (100 / slidesPerView));
        catalogTrack.style.transform = `translateX(${translateX}%)`;
    }
    
    // Обработчик изменения размера окна
    window.addEventListener('resize', function() {
        updateSlidesPerView();
        // Сбрасываем к первому слайду при изменении размера
        currentCatalogSlide = 0;
        goToCatalogSlide(0);
    });
    
    // Инициализация карусели каталога
    if (catalogTrack && catalogSlides.length > 0) {
        updateSlidesPerView();
        goToCatalogSlide(0);
        
        // Автоматическая прокрутка
        let autoPlayInterval;
        
        function startAutoPlay() {
            autoPlayInterval = setInterval(() => {
                const nextSlide = (currentCatalogSlide + 1) % Math.ceil(catalogSlides.length / slidesPerView);
                goToCatalogSlide(nextSlide);
            }, 5000); // 5 секунд
        }
        
        function stopAutoPlay() {
            if (autoPlayInterval) {
                clearInterval(autoPlayInterval);
            }
        }
        
        // Запускаем автопрокрутку
        startAutoPlay();
        
        // Останавливаем автопрокрутку при наведении
        catalogTrack.addEventListener('mouseenter', stopAutoPlay);
        catalogTrack.addEventListener('mouseleave', startAutoPlay);
    }
});
</script>
