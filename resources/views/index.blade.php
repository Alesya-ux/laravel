
@extends('layouts.tall')
@section('content')

<style>
/* ========================================
   СТИЛИ ДЛЯ КАТАЛОГА (TAILWIND COMPATIBLE)
   ======================================== */

/* Ограничение текста для Tailwind */
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* Дополнительный breakpoint для очень маленьких экранов */
@media (max-width: 640px) {
    .xs\:w-\[calc\(100\%-0\.1rem\)\] {
        width: calc(100% - 0.1rem);
    }
}


/* ========================================
   СТИЛИ ГЛАВНОЙ КАРУСЕЛИ (MAIN CAROUSEL)
   ========================================
   
   ОПИСАНИЕ:
   - CSS стили для интерактивного слайдера
   - Анимации переходов между слайдами
   - Стили кнопок навигации
   - Адаптивные стили для разных устройств
*/

/* ========================================
   СТИЛИ СЛАЙДОВ КАРУСЕЛИ
   ======================================== */

/* 
    БАЗОВЫЕ СТИЛИ ДЛЯ ВСЕХ СЛАЙДОВ
    ================================
    
    ОПИСАНИЕ:
    - Применяются ко всем слайдам по умолчанию
    - Слайды изначально невидимы (opacity: 0)
    - Используется абсолютное позиционирование для наложения
    - Плавные переходы для создания анимации
*/
.carousel-item {
    transition: opacity 0.5s ease-in-out;  /* Плавный переход прозрачности за 0.5 секунды */
    opacity: 0;                             /* Изначально полностью прозрачен (невидим) */
    position: absolute;                     /* Абсолютное позиционирование для наложения слайдов */
    top: 0;                                /* Позиционирование сверху */
    left: 0;                               /* Позиционирование слева */
    width: 100%;                           /* Занимает всю ширину контейнера */
    height: 100%;                          /* Занимает всю высоту контейнера */
}

/* 
    СТИЛИ ДЛЯ АКТИВНОГО СЛАЙДА
    ===========================
    
    ОПИСАНИЕ:
    - Применяются только к видимому слайду
    - Полная непрозрачность (opacity: 1)
    - Относительное позиционирование для нормального потока документа
*/
.carousel-item.active {
    opacity: 1;                             /* Полностью непрозрачен (видим) */
    position: relative;                     /* Относительное позиционирование для нормального потока */
}

/* ========================================
   КОНТЕЙНЕР КАРУСЕЛИ
   ======================================== */

/* 
    ОСНОВНОЙ КОНТЕЙНЕР ДЛЯ СЛАЙДЕРА
    =================================
    
    ОПИСАНИЕ:
    - Создает контекст позиционирования для слайдов
    - Устанавливает фиксированную высоту
    - Скрывает выходящие за границы элементы
*/
.carousel-container {
    position: relative;                     /* Создает контекст позиционирования для абсолютно позиционированных слайдов */
    height: 450px;                         /* Фиксированная высота карусели  */
    overflow: hidden;                      /* Скрывает части слайдов, выходящие за границы контейнера */
}

/* ========================================
   КНОПКИ НАВИГАЦИИ КАРУСЕЛИ
   ======================================== */

/* 
    БАЗОВЫЕ СТИЛИ ДЛЯ КНОПОК НАВИГАЦИИ
    ===================================
    
    ОПИСАНИЕ:
    - Круглые полупрозрачные кнопки
    - Позиционируются поверх слайдов
    - Имеют hover эффекты и плавные переходы
    - Центрируются по вертикали
*/
.carousel-nav-btn {
    position: absolute;                     /* Абсолютное позиционирование относительно контейнера карусели */
    top: 50%;                              /* Позиционирование по центру по вертикали */
    transform: translateY(-50%);           /* Точное центрирование с учетом высоты кнопки */
    z-index: 20;                          /* Высокий z-index для отображения поверх слайдов */
    background-color: rgba(255, 255, 255, 0.8); /* Полупрозрачный белый фон (80% непрозрачности) */
    border: none;                          /* Убираем стандартную рамку */
    border-radius: 50%;                    /* Круглая форма кнопки */
    width: 50px;                          /* Ширина кнопки (3.125rem) */
    height: 50px;                         /* Высота кнопки (3.125rem) */
    display: flex;                         /* Flexbox для центрирования содержимого */
    align-items: center;                   /* Центрирование по вертикали */
    justify-content: center;               /* Центрирование по горизонтали */
    cursor: pointer;                       /* Курсор-указатель при наведении */
    transition: background-color 0.3s ease; /* Плавный переход цвета фона за 0.3 секунды */
}

/* 
    HOVER ЭФФЕКТ ДЛЯ КНОПОК НАВИГАЦИИ
    ===================================
    
    ОПИСАНИЕ:
    - При наведении курсора фон становится полностью белым
    - Создает интерактивность и улучшает UX
*/
.carousel-nav-btn:hover {
    background-color: white;               /* Полностью белый фон при наведении */
}

/* 
    ПОЗИЦИОНИРОВАНИЕ ЛЕВОЙ КНОПКИ (ПРЕДЫДУЩИЙ)
    ===========================================
    
    ОПИСАНИЕ:
    - Размещается слева от контейнера
    - Отступ 20px от левого края
*/
.carousel-nav-btn.prev {
    left: 20px;                           /* Отступ от левого края (1.25rem) */
}

/* 
    ПОЗИЦИОНИРОВАНИЕ ПРАВОЙ КНОПКИ (СЛЕДУЮЩИЙ)
    ===========================================
    
    ОПИСАНИЕ:
    - Размещается справа от контейнера
    - Отступ 20px от правого края
*/
.carousel-nav-btn.next {
    right: 20px;                          /* Отступ от правого края (1.25rem) */
}

/* 
    СТИЛИ ДЛЯ ОТКЛЮЧЕННЫХ КНОПОК
    ==============================
    
    ОПИСАНИЕ:
    - Применяются когда кнопка неактивна
    - Сниженная прозрачность и отключенный курсор
    - Используется для крайних слайдов (первый/последний)
*/
.carousel-nav-btn:disabled {
    opacity: 0.5;                         /* Сниженная прозрачность (50%) */
    cursor: not-allowed;                  /* Курсор "запрещено" */
}

</style>

    <main>
        <!-- ГЛАВНАЯ КАРУСЕЛЬ (MAIN CAROUSEL) -->
        <section class="rounded-lg bg-neutral-50 shadow-lg p-2 sm:p-4 max-w-[95%] mx-auto mt-6 sm:mt-8 md:mt-10 fade-in">
            <div class="carousel-container w-full min-h-[300px] sm:min-h-[400px] md:min-h-[500px] lg:min-h-[600px]" id="mainCarousel">
                <div id="slide1" class="carousel-item active">
                    <div class="hero relative overflow-hidden h-full">
                        <div class="hero-bg absolute top-0 left-0 w-full h-full z-0"
                             style="background-image: url('/pictures/glavnaya/1.png'); background-size: cover; background-position: center; opacity: 0.2;"></div>
                        <div class="hero-content flex-col lg:flex-row-reverse relative z-10 ">
                            <div class="px-4 sm:px-8 md:px-12 lg:px-16 xl:px-20">
                                <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl 2xl:text-7xl font-bold text-gray-800 leading-tight">Профессиональные дезинфицирующие средства и оборудование</h1>
                                <div class="flex justify-end mt-4">
                                    <a href="/catalog" class="btn bg-[#F44336] hover:bg-[#D32F2F] text-white animate-pulse shadow-lg px-3 py-2 sm:px-4 sm:py-2 text-xs sm:text-sm font-semibold">Каталог</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="slide2" class="carousel-item">
                    <div class="hero relative overflow-hidden h-full">
                        <div class="hero-bg absolute top-0 left-0 w-full h-full z-0"
                             style="background-image: url('/pictures/glavnaya/2.jpg'); background-size: cover; background-position: center; opacity: 0.2;"></div>
                        <div class="hero-content flex-col lg:flex-row-reverse relative z-10">
                            <div class="px-4 sm:px-8 md:px-12 lg:px-16 xl:px-20">
                                <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl 2xl:text-7xl font-bold text-gray-800 leading-tight">Дезинфицирующее оборудование</h1>
                                <p class="py-2 sm:py-3 md:py-4 text-sm sm:text-base md:text-lg lg:text-xl xl:text-2xl font-semibold text-gray-700 leading-relaxed">
                                    Профессиональные решения для дезинфекции: от портативных устройств до промышленных систем!
                                </p>
                                <div class="flex justify-end mt-4">
                                    <a href="/catalog/2" class="btn bg-[#F44336] hover:bg-[#D32F2F] text-white animate-pulse shadow-lg px-3 py-2 sm:px-4 sm:py-2 text-xs sm:text-sm font-semibold">Узнать больше</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="slide3" class="carousel-item">
                    <div class="hero relative overflow-hidden h-full">
                        <div class="hero-bg absolute top-0 left-0 w-full h-full z-0"
                             style="background-image: url('/pictures/glavnaya/3.jpg'); background-size: cover; background-position: center; opacity: 0.2;"></div>
                        <div class="hero-content flex-col lg:flex-row-reverse relative z-10">
                            <div class="px-4 sm:px-8 md:px-12 lg:px-16 xl:px-20">
                                <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl 2xl:text-7xl font-bold text-gray-800 leading-tight">Антибактериальные ковры</h1>
                                <p class="py-2 sm:py-3 md:py-4 text-sm sm:text-base md:text-lg lg:text-xl xl:text-2xl font-semibold text-gray-700 leading-relaxed">
                                    Инновационные ковры с антибактериальными свойствами для безопасной среды в вашем помещении!
                                </p>
                                <div class="flex justify-end mt-4">
                                    <a href="/catalog/1" class="btn bg-[#F44336] hover:bg-[#D32F2F] text-white animate-pulse shadow-lg px-3 py-2 sm:px-4 sm:py-2 text-xs sm:text-sm font-semibold">Выбрать ковер</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <button class="carousel-nav-btn prev" id="prevBtn">❮</button>
                <button class="carousel-nav-btn next" id="nextBtn">❯</button>
            </div>
        </section>

        <!-- Блок "О нас" -->
        <section class="rounded-lg bg-neutral-50 shadow-lg p-10 max-w-[70%] mx-auto mt-10 fade-in">
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

        <section class="rounded-lg bg-neutral-50 max-w-[95%] mx-auto shadow-lg p-10 mt-10 fade-in">
            <div class="ml-4 w-full lg:w-1/2">
                <h2 class="text-3xl font-semibold text-gray-800">Каталог</h2>
            </div>
            
            <!-- Адаптивная карусель каталога -->
            <div class="relative mt-6">
                <!-- Контейнер карусели -->
                <div class="relative w-full overflow-hidden py-3 bg-transparent">
                    <div class="flex transition-transform duration-500 ease-in-out" id="catalogTrack">
                        @foreach($catalogs as $catalog)
                            <div class="catalog-slide flex-shrink-0 w-[calc(20%-0.1rem)] min-w-[160px] xl:w-[calc(20%-0.1rem)] lg:w-[calc(25%-0.1rem)] md:w-[calc(33.333%-0.1rem)] sm:w-[calc(50%-0.1rem)] xs:w-[calc(100%-0.1rem)]">
                                <div class="card bg-base-200 image-full shadow-lg transition-all duration-300 group mx-0.5 h-[420px] md:h-[380px] sm:h-[400px] hover:-translate-y-2 hover:shadow-2xl">
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
    // ========================================
    // АНИМАЦИИ ПОЯВЛЕНИЯ ПРИ СКРОЛЛЕ (FADE-IN)
    // ========================================
    
    /*
        ОПИСАНИЕ:
        - Анимация плавного появления элементов при прокрутке страницы
        - Использует современный Intersection Observer API
        - Элементы с классом 'fade-in' плавно появляются при видимости
        - Создает эффект "раскрытия" контента по мере прокрутки
        - Улучшает пользовательский опыт и восприятие страницы
        
        ПРИНЦИП РАБОТЫ:
        1. Находим все элементы с классом 'fade-in'
        2. Создаем Intersection Observer для отслеживания видимости
        3. При появлении элемента в области видимости добавляем класс 'fade-in-visible'
        4. CSS автоматически анимирует появление элемента
    */
    
    // Функция для инициализации анимаций появления элементов
    function initScrollAnimations() {
        // ========================================
        // НАСТРОЙКИ ДЛЯ INTERSECTION OBSERVER
        // ========================================
        
        /*
            ОПИСАНИЕ ПАРАМЕТРОВ:
            - threshold: 0.1 - срабатывает когда 10% элемента становится видимым
            - rootMargin: '0px 0px -50px 0px' - отступ снизу 50px для раннего срабатывания
            
            ПРЕИМУЩЕСТВА:
            - Раннее срабатывание создает плавность анимации
            - 10% видимости обеспечивает естественное появление
            - Отступ снизу компенсирует возможные задержки
        */
        const observerOptions = {
            threshold: 0.1,                    // Срабатывает когда 10% элемента видно
            rootMargin: '0px 0px -50px 0px'   // Отступ снизу 50px для раннего срабатывания
        };
        
        // ========================================
        // СОЗДАНИЕ INTERSECTION OBSERVER
        // ========================================
        
        /*
            ОПИСАНИЕ:
            - Создает наблюдатель за пересечением элементов с областью видимости
            - Автоматически отслеживает появление элементов в viewport
            - Эффективнее чем scroll event listener
            
            ПАРАМЕТРЫ:
            - entries: массив элементов, которые пересекли порог видимости
            - entry.isIntersecting: true если элемент стал видимым
        */
        const fadeObserver = new IntersectionObserver((entries) => {
            // Обрабатываем каждый элемент, который пересек порог видимости
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    // Элемент стал видимым - добавляем класс для анимации появления
                    entry.target.classList.add('fade-in-visible');
                    console.log('Элемент появился в области видимости:', entry.target);
                }
            });
        }, observerOptions);
        
        // ========================================
        // ПОИСК И НАЧАЛО НАБЛЮДЕНИЯ ЗА ЭЛЕМЕНТАМИ
        // ========================================
        
        // Находим все элементы с классом 'fade-in' на текущей странице
        const fadeElements = document.querySelectorAll('.fade-in');
        console.log(`Найдено элементов для анимации появления: ${fadeElements.length}`);
        
        // Начинаем наблюдение за каждым найденным элементом
        fadeElements.forEach(element => {
            fadeObserver.observe(element);
            console.log('Начинаем наблюдение за элементом:', element);
        });
        
        console.log('Анимации появления при скролле инициализированы');
    }
    
    // ========================================
    // ЗАПУСК АНИМАЦИЙ ПОЯВЛЕНИЯ
    // ========================================
    
    /*
        ОПИСАНИЕ:
        - Вызываем функцию инициализации при загрузке страницы
        - Все элементы с классом 'fade-in' автоматически получают анимацию
        - Работает для статического и динамически загруженного контента
    */
    
    // Инициализируем анимации появления элементов
    initScrollAnimations();
    
    // ========================================
    // ГЛАВНАЯ КАРУСЕЛЬ (MAIN CAROUSEL)
    // ========================================
    
    /*
        ОПИСАНИЕ:
        - Интерактивный слайдер с 3 слайдами
        - Плавные переходы между слайдами через изменение opacity
        - Кнопки навигации (вперед/назад)
        - Циклическое переключение (последний → первый, первый → последний)
        - Автоматическая инициализация первого слайда
    */
    
    // ========================================
    // ИНИЦИАЛИЗАЦИЯ ПЕРЕМЕННЫХ КАРУСЕЛИ
    // ========================================
    
    // Получаем основной контейнер карусели по ID
    const carousel = document.getElementById('mainCarousel');
    
    // Находим все слайды внутри карусели (элементы с классом 'carousel-item')
    const slides = carousel.querySelectorAll('.carousel-item');
    
    // Получаем кнопки навигации по их ID
    const prevBtn = document.getElementById('prevBtn');    // Кнопка "Предыдущий слайд" (❮)
    const nextBtn = document.getElementById('nextBtn');    // Кнопка "Следующий слайд" (❯)
    
    // Индекс текущего активного слайда (начинаем с 0 - первый слайд)
    let currentSlide = 0;

    // ========================================
    // ФУНКЦИЯ ПЕРЕКЛЮЧЕНИЯ СЛАЙДОВ
    // ========================================
    
    /*
        ОПИСАНИЕ:
        - Переключает карусель на указанный слайд
        - Управляет видимостью слайдов через CSS классы
        - Обновляет индекс текущего слайда
        
        ПАРАМЕТРЫ:
        - slideIndex: number - индекс слайда для показа (0, 1, 2)
        
        ПРИНЦИП РАБОТЫ:
        1. Проходит по всем слайдам
        2. Добавляет класс 'active' нужному слайду
        3. Убирает класс 'active' у всех остальных слайдов
        4. Обновляет переменную currentSlide
    */
    function goToSlide(slideIndex) {
        // Проходим по всем слайдам и управляем их видимостью
        slides.forEach((slide, index) => {
            if (index === slideIndex) {
                // Показываем нужный слайд
                slide.classList.add('active');
                console.log(`Показываем слайд ${index + 1}`);
            } else {
                // Скрываем все остальные слайды
                slide.classList.remove('active');
            }
        });
        
        // Обновляем индекс текущего активного слайда
        currentSlide = slideIndex;
        console.log(`Текущий активный слайд: ${currentSlide + 1}`);
    }

    // ========================================
    // ОБРАБОТЧИКИ СОБЫТИЙ ДЛЯ КНОПОК НАВИГАЦИИ
    // ========================================
    
    /*
        ОПИСАНИЕ:
        - Обрабатывают клики по кнопкам навигации
        - Вычисляют индекс следующего/предыдущего слайда
        - Обеспечивают циклическое переключение
        - Предотвращают стандартное поведение браузера
    */
    
    // Обработчик для кнопки "Предыдущий слайд" (❮)
    prevBtn.addEventListener('click', function(e) {
        e.preventDefault(); // Предотвращаем стандартное поведение браузера
        
        // Вычисляем индекс предыдущего слайда с циклическим переходом
        // Формула: (текущий - 1 + количество слайдов) % количество слайдов
        // Это обеспечивает переход от первого слайда к последнему
        const nextSlideIndex = (currentSlide - 1 + slides.length) % slides.length;
        
        console.log(`Переключаем на предыдущий слайд: ${nextSlideIndex + 1}`);
        goToSlide(nextSlideIndex); // Переключаем на вычисленный слайд
    });

    // Обработчик для кнопки "Следующий слайд" (❯)
    nextBtn.addEventListener('click', function(e) {
        e.preventDefault(); // Предотвращаем стандартное поведение браузера
        
        // Вычисляем индекс следующего слайда с циклическим переходом
        // Формула: (текущий + 1) % количество слайдов
        // Это обеспечивает переход от последнего слайда к первому
        const nextSlideIndex = (currentSlide + 1) % slides.length;
        
        console.log(`Переключаем на следующий слайд: ${nextSlideIndex + 1}`);
        goToSlide(nextSlideIndex); // Переключаем на вычисленный слайд
    });

    // ========================================
    // ИНИЦИАЛИЗАЦИЯ КАРУСЕЛИ
    // ========================================
    
    /*
        ОПИСАНИЕ:
        - Показываем первый слайд при загрузке страницы
        - Обеспечиваем корректное начальное состояние
        - Первый слайд уже имеет класс 'active' в HTML, но для надежности вызываем функцию
    */
    
    // Показываем первый слайд по умолчанию (индекс 0)
    goToSlide(0);
    console.log('Главная карусель инициализирована, показан первый слайд');

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
        if (width >= 1280) { // xl и больше (2xl) - 5 позиций
            slidesPerView = 5;
        } else if (width >= 1024) { // lg - 4 позиции  
            slidesPerView = 4;
        } else if (width >= 768) { // md - 3 позиции
            slidesPerView = 3;
        } else if (width >= 640) { // sm - 2 позиции
            slidesPerView = 2;
        } else { // меньше sm - 1 позиция
            slidesPerView = 1;
        }
        console.log(`Ширина экрана: ${width}px, видимых слайдов: ${slidesPerView}`);
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
        console.log(`Карусель каталога инициализирована: ${catalogSlides.length} слайдов, ${slidesPerView} видимых`);
        console.log(`Ширина контейнера: ${catalogTrack.parentElement.offsetWidth}px`);
        console.log(`Ширина одной карточки: ${catalogSlides[0]?.offsetWidth}px`);
        
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
