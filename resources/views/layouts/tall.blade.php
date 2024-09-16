<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="image/x-icon" rel="shortcut icon" href="pictures/logo/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.23/dist/full.min.css" rel="stylesheet" type="text/css"/>
    <script src="https://cdn.tailwindcss.com"></script>
    @include('components.global-styles')
    <title>АДЕНТИНА СЕРВИС</title>
    <meta name="description" content="Компания АДЕНТИНА СЕРВИС осуществляет продажу дезматов и дезковриков,генераторов холодного и горячего тумана,а также доставку продукции во все Беларуси"> <!-- Сделать описание компании -->
    <meta name="keywords" content="дезковрики, дезковрик, дезматы, дезинфектанты, дезинфекционные коврики,генераторы горячего тумана, дезустановка, дустер, дозатор сенсорный, дозатор локтевой, генераторы холодного тумана "><!-- Записать ключевые слова -->
</head> <!-- Отладка SEO -->

<body class="bg-base-200" data-smooth-scroll="true">

<header class="shadow-sm header-transition sticky top-0 z-50">
    <nav class="bg-neutral-50 flex flex-col shadow-lg shadow-gray-200/50">
        <!-- Верхняя часть header'а -->
        <div class="flex flex-col lg:flex-row items-center justify-between border-cyan-700 border-b px-4 py-2">
           
        <!-- Логотип -->
            <div class="flex justify-center lg:justify-start mb-2 lg:mb-0">
                <a href="/" class="flex items-center">
                    <img src="/pictures/logo/android-chrome-192x192.png" alt="Logo" class="h-12 lg:h-16 cursor-pointer logo-spin">
                    <span class="ml-2 text-lg lg:text-xl font-bold text-cyan-700 hidden sm:block">АДЕНТИНА СЕРВИС</span>
                </a>
            </div>

            <!-- Поисковая форма -->
            <div class="w-full lg:w-auto mb-2 lg:mb-0">
                <form action="/search" method="GET" class="flex items-center justify-center lg:justify-start">
                    <div class="relative">
                        <input
                            type="text"
                            name="q"
                            placeholder="Поиск..."
                            class="p-2 pl-10 pr-4 border rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-700 w-64 lg:w-80"/>
                        <svg class="absolute left-3 top-2.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <button type="submit" class="btn ml-2 bg-cyan-700 hover:bg-cyan-600 text-white">
                        Найти
                    </button>
                </form>
            </div>

            <!-- Контактная информация -->
            <div class="flex flex-col items-center lg:items-end text-sm text-center lg:text-right mb-2 lg:mb-0">
                <div class="flex items-center mb-1">
                    <svg class="h-4 w-4 text-cyan-700 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                    </svg>
                    <a href="tel:+375296133169" class="hover:text-cyan-700 font-medium">+375 (29) 613-31-69</a>
                </div>
                <div class="flex items-center mb-1">
                    <svg class="h-4 w-4 text-cyan-700 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <a href="https://www.google.com/maps?q=Ваш+точный+адрес" target="_blank" rel="noopener noreferrer" class="hover:text-cyan-700">
                        г. Минск, ул.Ваупшасова, 42А
                    </a>
                </div>
                <div class="flex items-center">
                    <svg class="h-4 w-4 text-cyan-700 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>Пн-Пт 9:00-17:30</span>
                </div>
            </div>

            <!-- Кнопки авторизации и корзина -->
            <div class="flex items-center space-x-2">
                <!-- Корзина -->
                <div class="relative">
                    <a href="/cart" class="btn btn-circle btn-soft bg-cyan-700 hover:bg-cyan-600 text-white">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                    </a>
                </div>

                <!-- Кнопки авторизации -->
                @guest()
                    <div class="dropdown dropdown-end">
                        <div tabindex="0" role="button" class="btn btn-circle bg-cyan-700 hover:bg-cyan-600 text-white">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <ul tabindex="0" class="dropdown-content z-[100] menu shadow bg-neutral-50 rounded-box min-w-max mt-1">
                            <li><a href="/login" class="text-cyan-700 hover:text-cyan-700 transition-colors duration-200">Вход</a></li>
                            <li><a href="/register" class="text-cyan-700 hover:text-cyan-700 transition-colors duration-200">Регистрация</a></li>
                        </ul>
                    </div>
                @else
                    <div class="dropdown dropdown-end">
                        <div tabindex="0" role="button" class="btn btn-circle bg-cyan-700 hover:bg-cyan-600 text-white">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <ul tabindex="0" class="dropdown-content z-[100] menu shadow bg-neutral-50 rounded-box min-w-max mt-1">
                            <li><a href="/dashboard" class="text-cyan-700 hover:text-cyan-700 transition-colors duration-200">Личный кабинет</a></li>
                            <li><a href="/profile" class="text-cyan-700 hover:text-cyan-700 transition-colors duration-200">Профиль</a></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full text-left text-cyan-700 hover:text-cyan-700 transition-colors duration-200">
                                        Выход
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @endguest
            </div>
        </div>

        <!-- Навигационное меню -->
        <div class="flex items-center justify-between px-4 py-2">
            <!-- Основное меню -->
            <div class="hidden lg:flex items-center space-x-1">
                <a href="/" class="nav-link p-3  hover:text-cyan-700 rounded-md transition-colors duration-200 {{ $world == 'home' ? 'bg-cyan-700 text-white' : '' }}">
                    Главная
                </a>
                
                <!-- ========================================
                     ВЫПАДАЮЩЕЕ МЕНЮ КАТАЛОГА
                     ======================================== -->
                <div class="group relative">
                    <!-- 
                        КЛАСС "group" - создает контекст для группировки hover-эффектов
                        КЛАСС "relative" - устанавливает относительное позиционирование для абсолютного позиционирования дочерних элементов
                    -->
                    
                    <!-- ССЫЛКА-ТРИГГЕР ДЛЯ ВЫПАДАЮЩЕГО МЕНЮ -->
                    <a href="/catalog" class="nav-link p-3 hover:text-cyan-700 rounded-md transition-colors duration-200 flex items-center">
                        <!-- Текст ссылки -->
                        Каталог
                        
                        <!-- СТРЕЛКА-ИНДИКАТОР ВЫПАДАЮЩЕГО МЕНЮ -->
                        <svg class="h-4 w-4 ml-1 transition-transform duration-200 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <!-- 
                                КЛАССЫ СТРЕЛКИ:
                                - "h-4 w-4" - размеры стрелки (16x16px)
                                - "ml-1" - отступ слева от текста
                                - "transition-transform duration-200" - плавный переход для трансформации за 200ms
                                - "group-hover:rotate-180" - поворот на 180° при наведении на родительский элемент
                            -->
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </a>
                    
                    <!-- ВЫПАДАЮЩЕЕ МЕНЮ С ПОДКАТЕГОРИЯМИ -->
                    <ul class="invisible group-hover:visible opacity-0 group-hover:opacity-100 absolute top-full left-0 z-[100] bg-white shadow-lg rounded-lg min-w-[200px] mt-1 border border-gray-200 transition-all duration-200 transform -translate-y-2 group-hover:translate-y-0">
                        <!-- 
                            КЛАССЫ ВЫПАДАЮЩЕГО МЕНЮ:
                            
                            ВИДИМОСТЬ И ПРОЗРАЧНОСТЬ:
                            - "invisible" - изначально невидимо (не занимает место в потоке)
                            - "group-hover:visible" - становится видимым при наведении на родительский элемент
                            - "opacity-0" - изначально полностью прозрачно
                            - "group-hover:opacity-100" - становится непрозрачным при наведении
                            
                            ПОЗИЦИОНИРОВАНИЕ:
                            - "absolute" - абсолютное позиционирование относительно родителя
                            - "top-full" - размещается сразу под родительским элементом
                            - "left-0" - выравнивается по левому краю родителя
                            - "z-[100]" - высокий z-index для правильного наложения
                            
                            СТИЛИЗАЦИЯ:
                            - "bg-white" - белый фон
                            - "shadow-lg" - большая тень для глубины
                            - "rounded-lg" - скругленные углы
                            - "min-w-[200px]" - минимальная ширина 200px
                            - "mt-1" - отступ сверху 4px
                            - "border border-gray-200" - серая рамка
                            
                            АНИМАЦИЯ:
                            - "transition-all duration-200" - плавные переходы для всех свойств за 200ms
                            - "transform -translate-y-2" - изначально смещено вверх на 8px
                            - "group-hover:translate-y-0" - возвращается в нормальное положение при наведении
                        -->
                        
                        <!-- ЦИКЛ ПО КАТАЛОГАМ - ГЕНЕРИРУЕТ ПОДМЕНЮ -->
                        @foreach($catalogs as $catalog)
                            <li>
                                <!-- ССЫЛКА НА ПОДКАТЕГОРИЮ -->
                                <a href="/catalog/{{$catalog->id}}" class="block px-4 py-3 text-gray-700 hover:bg-gray-50 hover:text-cyan-700 transition-colors duration-200 border-b border-gray-100 last:border-b-0">
                                    <!-- 
                                        КЛАССЫ ССЫЛКИ ПОДКАТЕГОРИИ:
                                        - "block" - блочный элемент на всю ширину
                                        - "px-4 py-3" - внутренние отступы (16px по горизонтали, 12px по вертикали)
                                        - "text-gray-700" - цвет текста (темно-серый)
                                        - "hover:bg-gray-50" - светло-серый фон при наведении
                                        - "hover:text-cyan-700" - синий цвет текста при наведении
                                        - "transition-colors duration-200" - плавные переходы цветов за 200ms
                                        - "border-b border-gray-100" - нижняя граница для разделения элементов
                                        - "last:border-b-0" - убирает границу у последнего элемента
                                    -->
                                    {{$catalog->name}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <a href="/aboute" class="nav-link p-3  hover:text-cyan-700 rounded-md transition-colors duration-200 {{ $world == 'aboute' ? 'bg-cyan-700 text-white' : '' }}">
                    О нас
                </a>

                <a href="/delivery" class="nav-link p-3  hover:text-cyan-700 rounded-md transition-colors duration-200 {{ $world == 'delivery' ? 'bg-cyan-700 text-white' : '' }}">
                    Доставка
                </a>

                <a href="/contacts" class="nav-link p-3  hover:text-cyan-700 rounded-md transition-colors duration-200 {{ $world == 'contacts' ? 'bg-cyan-700 text-white' : '' }}">
                    Контакты
                </a>
            </div>

            <!-- Мобильное меню -->
            <div class="lg:hidden">
                <div class="dropdown dropdown-end">
                    <div tabindex="0" role="button" class="btn btn-square btn-ghost">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </div>
                    <ul tabindex="0" class="dropdown-content z-[100] menu shadow bg-neutral-50 rounded-box min-w-max mt-1 p-2">
                        <li><a href="/" class="hover:text-cyan-700 transition-colors duration-200">Главная</a></li>
                        <li>
                            <details>
                                <summary class="hover:text-cyan-700 transition-colors duration-200">Каталог</summary>
                                <ul>
                                    @foreach($catalogs as $catalog)
                                        <li><a href="/catalog/{{$catalog->id}}" class="pl-4 hover:text-cyan-700 transition-colors duration-200">{{$catalog->name}}</a></li>
                                    @endforeach
                                </ul>
                            </details>
                        </li>
                        <li><a href="/aboute" class="hover:text-cyan-700 transition-colors duration-200">О нас</a></li>
                        <li><a href="/delivery" class="hover:text-cyan-700 transition-colors duration-200">Доставка</a></li>
                        <li><a href="/contacts" class="hover:text-cyan-700 transition-colors duration-200">Контакты</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>

@yield('content')

    <style>
        /* ========================================
           АНИМАЦИЯ СМЕНЫ ИЗОБРАЖЕНИЙ
           ======================================== */
        
        /* Первое изображение должно быть видно сразу при загрузке */
        .image-slide:first-child {
            opacity: 1 !important;
            animation-play-state: running;
        }
        
        .image-slide {
            transition: opacity 0.2s ease-in-out;
            animation-fill-mode: both;
            animation-delay: 0s;
            will-change: opacity;
            backface-visibility: hidden;
            transform: translateZ(0);
        }
        
        @keyframes imageCycle1 {
            0%, 12.5% { opacity: 1; } /* 0-0.75 секунды - первая картинка */
            16.67%, 100% { opacity: 0; } /* 1-6 секунды - скрыта */
        }
        
        @keyframes imageCycle2 {
            0%, 12.5% { opacity: 0; } /* 0-0.75 секунды - скрыта */
            16.67%, 29.17% { opacity: 1; } /* 1-1.75 секунды - вторая картинка */
            33.33%, 100% { opacity: 0; } /* 2-6 секунды - скрыта */
        }
        
        @keyframes imageCycle3 {
            0%, 29.17% { opacity: 0; } /* 0-1.75 секунды - скрыта */
            33.33%, 45.83% { opacity: 1; } /* 2-2.75 секунды - третья картинка */
            50%, 100% { opacity: 0; } /* 3-6 секунды - скрыта */
        }
        
        @keyframes imageCycle4 {
            0%, 45.83% { opacity: 0; } /* 0-2.75 секунды - скрыта */
            50%, 62.5% { opacity: 1; } /* 3-3.75 секунды - четвертая картинка */
            66.67%, 100% { opacity: 0; } /* 4-6 секунды - скрыта */
        }
        
        @keyframes imageCycle5 {
            0%, 62.5% { opacity: 0; } /* 0-3.75 секунды - скрыта */
            66.67%, 79.17% { opacity: 1; } /* 4-4.75 секунды - пятая картинка */
            83.33%, 100% { opacity: 0; } /* 5-6 секунды - скрыта */
        }
        

        
        /* ========================================
           АНИМАЦИЯ PULSE - ПУЛЬСАЦИЯ ЭЛЕМЕНТОВ
           ======================================== */
        
        /* Ключевые кадры для анимации пульсации */
        @keyframes pulse {
            0% {
                transform: scale(1);        /* Начальный размер - 100% */
                opacity: 1;                 /* Полная непрозрачность */
            }
            50% {
                transform: scale(1.05);     /* Увеличение до 105% в середине анимации */
                opacity: 0.8;               /* Снижение прозрачности до 80% */
            }
            100% {
                transform: scale(1);        /* Возврат к исходному размеру */
                opacity: 1;                 /* Восстановление полной непрозрачности */
            }
        }

        /* Класс для применения анимации пульсации */
        .pulse {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite; /* Анимация 2 сек, плавная кривая, бесконечно */
        }
        
       
        /* ========================================
           СТИЛИ ДЛЯ HEADER - ШАПКА САЙТА
           ======================================== */
        
        /* 
            ПЛАВНЫЕ ПЕРЕХОДЫ ДЛЯ ВСЕХ ИЗМЕНЕНИЙ В HEADER
            ===============================================
            Обеспечивает плавность анимации при изменении состояния header'а
            (например, при прокрутке страницы)
        */
        .header-transition {
            transition: all 0.3s ease-in-out;                             /* 
                                                                                Переход 0.3 сек для всех свойств
                                                                                с плавным ускорением/замедлением
                                                                                ease-in-out создает естественную анимацию
                                                                            */
        }
        
        /* 
            СТИЛИ ДЛЯ ЗАФИКСИРОВАННОГО HEADER ПРИ ПРОКРУТКЕ
            =================================================
            Применяются когда header становится "липким" (sticky)
            и остается в верхней части экрана при прокрутке
        */
        header.sticky {
            backdrop-filter: blur(8px);                                    /* 
                                                                                Размытие фона под header'ом на 8px
                                                                                Создает эффект "стеклянного" header'а
                                                                                с размытым содержимым страницы
                                                                            */
            background-color: rgba(250, 250, 250, 0.95);                  /* 
                                                                                Полупрозрачный белый фон (95% непрозрачности)
                                                                                Обеспечивает читаемость с легкой прозрачностью
                                                                            */
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06); /* 
                                                                                                        Многослойная тень для глубины
                                                                                                        Первый слой: большая тень снизу
                                                                                                        Второй слой: меньшая тень для объема
                                                                                                    */
        }
        

        
        /* ========================================
           СТИЛИ ДЛЯ НАВИГАЦИОННЫХ ССЫЛОК
           ======================================== */
        
        /* 
            БАЗОВЫЕ СТИЛИ ДЛЯ НАВИГАЦИОННЫХ ССЫЛОК
            ========================================
            Этот класс применяется ко всем навигационным ссылкам, включая ссылку "Каталог"
            с выпадающим меню
        */
        .nav-link {
            position: relative;                    /* 
                                                        Относительное позиционирование для псевдоэлементов
                                                        Позволяет абсолютно позиционировать ::after элемент
                                                    */
            transition: all 0.2s ease-in-out, transform 0.2s ease-in-out;     /* 
                                                        Плавные переходы 0.2 сек для всех свойств и трансформации
                                                        ease-in-out создает плавное ускорение и замедление
                                                    */
        }
        
        /* 
            ПСЕВДОЭЛЕМЕНТ ДЛЯ ПОДЧЕРКИВАНИЯ ССЫЛОК
            =========================================
            Создает анимированную линию подчеркивания, которая появляется при наведении
            на навигационные ссылки
        */
        .nav-link::after {
            content: '';                          /* 
                                                        Пустое содержимое псевдоэлемента
                                                        Создает невидимый элемент для стилизации
                                                    */
            position: absolute;                   /* 
                                                        Абсолютное позиционирование относительно .nav-link
                                                        Позволяет точно разместить подчеркивание
                                                    */
            bottom: 0;                            /* 
                                                        Размещение внизу ссылки
                                                        Подчеркивание будет находиться под текстом
                                                    */
            left: 50%;                            /* 
                                                        Центрирование по горизонтали
                                                        Начальная позиция по центру ссылки
                                                    */
            width: 0;                             /* 
                                                        Начальная ширина 0 (невидимая линия)
                                                        Подчеркивание изначально скрыто
                                                    */
            height: 2px;                          /* 
                                                        Высота подчеркивания 2px
                                                        Толщина линии подчеркивания
                                                    */
            background-color: #0e7490;            /* 
                                                        Цвет подчеркивания (cyan-700)
                                                        Соответствует основной цветовой схеме сайта
                                                    */
            transition: all 0.3s ease-in-out;     /* 
                                                        Плавный переход для анимации
                                                        Длительность 0.3 сек с плавным ускорением/замедлением
                                                    */
            transform: translateX(-50%);           /* 
                                                        Центрирование с учетом ширины элемента
                                                        Компенсирует left: 50% для точного центрирования
                                                    */
        }
        
        /* 
            АНИМАЦИЯ ПОДЧЕРКИВАНИЯ ПРИ НАВЕДЕНИИ
            ======================================
            При наведении курсора на навигационную ссылку подчеркивание
            плавно расширяется от центра к краям
        */
        .nav-link:hover::after {
            width: 100%;                          /* 
                                                        Расширение подчеркивания на всю ширину ссылки
                                                        Создает эффект "раскрытия" линии от центра
                                                    */
        }
        
        /* 
            СТИЛИ ДЛЯ АКТИВНЫХ ССЫЛОК
            ==========================
            Базовые стили для активных ссылок (текущая страница)
            и их состояния при наведении и фокусе
        */
        .nav-link.bg-cyan-700,
        .nav-link.bg-cyan-700:hover,
        .nav-link.bg-cyan-700:focus {
            color: white !important;              /* 
                                                        Белый текст для активных ссылок
                                                        Обеспечивает читаемость на синем фоне
                                                    */
            background-color: #0e7490 !important; /* 
                                                        Цвет фона для активных ссылок
                                                        Поддерживаем визуальную идентификацию активной страницы
                                                    */
        }

/* 
    CSS-АНИМАЦИЯ ДЛЯ НАВИГАЦИОННЫХ ССЫЛОК ПРИ НАВЕДЕНИИ
    =====================================================
    Создает эффект "поднятия" ссылки при наведении курсора,
    что добавляет интерактивности и современности интерфейсу
*/
.nav-link:hover {
    transform: translateY(-2px);                  /* 
                                                        Поднимаем ссылку на 2px вверх при наведении
                                                        Создает эффект "всплытия" элемента
                                                    */
}
        
        /* ========================================
           АНИМАЦИЯ КОРЗИНЫ - ПОДПРЫГИВАНИЕ БЕЙДЖА
           ======================================== */
        
        /* Класс для анимации счетчика товаров в корзине */
.cart-badge {
    animation: bounce 1s infinite;        /* Анимация подпрыгивания 1 сек, бесконечно */
}

/* 
    CSS-АНИМАЦИЯ ДЛЯ КНОПКИ КОРЗИНЫ ПРИ КЛИКЕ
    ==========================================
    Создает эффект "нажатия" на кнопку корзины,
    что обеспечивает визуальную обратную связь пользователю
*/
a[href="/cart"] {
    transition: transform 0.15s ease-in-out;      /* 
                                                        Плавные переходы для трансформации
                                                        Длительность 0.15 сек для быстрого отклика
                                                    */
}

a[href="/cart"]:active {
    transform: scale(0.95);                       /* 
                                                        Уменьшаем кнопку до 95% при активном состоянии
                                                        Создает эффект "вдавливания" кнопки
                                                    */
}
        
        /* Ключевые кадры для анимации подпрыгивания */
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {            /* Временные точки: начало, 20%, середина, 80%, конец */
                transform: translateY(0);         /* Нормальное положение по вертикали */
            }
            40% {                                 /* В 40% времени анимации */
                transform: translateY(-3px);      /* Подъем на 3px вверх */
            }
            60% {                                 /* В 60% времени анимации */
                transform: translateY(-2px);      /* Подъем на 2px вверх (меньший) */
            }
        }
        
        /* ========================================
           АНИМАЦИЯ ЛОГОТИПА - ВРАЩЕНИЕ
           ======================================== */
        
        /* Класс для постоянного вращения логотипа */
        .logo-spin {
            animation: spin 8s linear infinite;   /* Медленное вращение 8 сек, линейная скорость, бесконечно */
        }
        
        /* Ускорение вращения при наведении на логотип */
        .logo-spin:hover {
            animation: spin 2s linear infinite;   /* Быстрое вращение 2 сек при наведении */
        }
        
        /* Ключевые кадры для анимации вращения */
        @keyframes spin {
            from {
                transform: rotate(0deg);           /* Начальный угол поворота - 0 градусов */
            }
            to {
                transform: rotate(360deg);         /* Конечный угол поворота - 360 градусов (полный круг) */
            }
        }
        

        

        

        
        /* Стили для модальных окон */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(4px);
        }
        
        .modal.modal-open {
            display: flex;
            align-items: center;
            justify-content: center;
            animation: fadeIn 0.3s ease-out;
        }
        
        .modal-box {
            background: white;
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.25);
            border: 1px solid rgba(8, 145, 178, 0.1);
            position: relative;
            max-width: 90vw;
            max-height: 90vh;
            overflow-y: auto;
            animation: modalSlideIn 0.3s ease-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        @keyframes modalSlideIn {
            from {
                opacity: 0;
                transform: scale(0.9) translateY(-20px);
            }
            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }
        

        

        
        /* Оптимизация для мобильных устройств */
        @media (max-width: 768px) {
            .image-slide {
                transition: opacity 0.15s ease-in-out;
            }
        }
        
        /* Размер изображений для анимации */
        .image-slide {
            width: 75%; /* Возвращаем к оригинальному размеру w-3/4 */
            height: auto;
            max-width: 100%;
            max-height: 100%;
        }
        
        /* Улучшенные стили для изображений в модальных окнах */
        .modal-box img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        
        .modal-box img:hover {
            transform: scale(1.02);
            transition: transform 0.3s ease-in-out;
        }
        
        /* Автоматический размер модального окна под содержимое */
        .modal-box {
            width: auto !important;
            min-width: 400px;
            max-width: 90vw !important;
        }
        

       
    </style>
<section class="rounded-lg bg-neutral-50 shadow-lg p-8 max-w-[70%] mx-auto mt-20">
    <div class="ml-4 w-full lg:w-1/2 mb-8">
        <h2 class="text-3xl font-semibold text-gray-800">Для Связи</h2>
    </div>

                <!-- Основной контент с двумя дивами -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-stretch contact-container">
        
        <!-- Левый див - Картинка -->
        <div class="relative group">
            <div class="relative overflow-hidden rounded-2xl shadow-2xl hover-lift bg-white p-8 flex items-center justify-center h-full">
                <img 
                    src="/pictures/obratnay/obratnay1.png" 
                    alt="Свяжитесь с нами" 
                    class="w-3/4 h-auto object-contain image-slide absolute opacity-100"
                    style="animation: imageCycle1 6s infinite;"
                >
                <img 
                    src="/pictures/obratnay/obratnay2.png" 
                    alt="Свяжитесь с нами" 
                    class="w-3/4 h-auto object-contain image-slide absolute opacity-0"
                    style="animation: imageCycle2 6s infinite;"
                >
                <img 
                    src="/pictures/obratnay/obratnay3.png" 
                    alt="Свяжитесь с нами" 
                    class="w-3/4 h-auto object-contain image-slide absolute opacity-0"
                    style="animation: imageCycle3 6s infinite;"
                >
                <img 
                    src="/pictures/obratnay/obratnay4.png" 
                    alt="Свяжитесь с нами" 
                    class="w-3/4 h-auto object-contain image-slide absolute opacity-0"
                    style="animation: imageCycle4 6s infinite;"
                >
                <img 
                    src="/pictures/obratnay/obratnay5.png" 
                    alt="Свяжитесь с нами" 
                    class="w-3/4 h-auto object-contain image-slide absolute opacity-0"
                    style="animation: imageCycle5 6s infinite;"
                >
            </div>
        </div>

        <!-- Правый див - Форма обратной связи -->
        <div class="bg-neutral-50 rounded-2xl shadow-xl p-8 hover-lift hover:translate-x-4 transition-transform duration-300 border border-cyan-700/20 ">
            <h3 class="text-2xl font-bold text-cyan-700 mb-6">Свяжитесь с нами</h3>
            
            <div class="mb-6">
                <p class="text-base-content/80">
                    Оставьте свои контактные данные, и мы свяжемся с вами!
                </p>
            </div>
            
            <form action="#" method="POST" class="space-y-6">
                <!-- Имя -->
                <div>
                    <label for="name" class="block text-sm font-medium text-cyan-700 mb-2">
                        Ваше имя <span class="text-error">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        required
                        class="input input-bordered w-full border-cyan-700/30 focus:border-cyan-700 focus:ring-2 focus:ring-cyan-700/20 transition-all duration-300"
                        placeholder="Введите ваше имя"
                    >
                </div>

                <!-- Телефон -->
                <div>
                    <label for="phone" class="block text-sm font-medium text-cyan-700 mb-2">
                        Номер телефона <span class="text-error">*</span>
                    </label>
                    <input 
                        type="tel" 
                        id="phone" 
                        name="phone"
                        required
                        class="input input-bordered w-full border-cyan-700/30 focus:border-cyan-700 focus:ring-2 focus:ring-cyan-700/20 transition-all duration-300"
                        placeholder="+375 (29) 123-45-67"
                    >
                </div>

                <!-- Кнопка отправки -->
                <button 
                    type="submit" 
                    class="btn w-full bg-cyan-700 hover:bg-cyan-600 text-white border-cyan-700 hover:border-cyan-600 hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl"
                >
                    <span class="flex items-center justify-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                        </svg>
                        <span>Отправить заявку</span>
                    </span>
                </button>
            </form>

            <!-- Дополнительная информация -->
            <div class="mt-8 pt-6 border-t border-gray-200">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm text-gray-600">
                    <div class="flex items-center space-x-2">
                        <svg class="w-5 h-5 text-cyan-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        <span>+375 (29) 613-31-69</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <svg class="w-5 h-5 text-cyan-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        <span>info@adentina.by</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="rounded-lg bg-neutral-50 shadow-lg p-4 max-w-[95%] mx-auto mt-20">
    <div class="ml-4 w-full lg:w-1/2 mb-4">
        <h2 class="text-2xl lg:text-3xl font-semibold text-center lg:text-left">Клиенты</h2>
    </div>
    
    <!-- Логотипы клиентов -->
    <div class="grid grid-cols-4 lg:grid-cols-8 gap-4 py-4">
        <div class="flex justify-center">
            <img src="/pictures/klient/logo/1.png" alt="Клиент 1" class="client-logo h-40 w-auto object-contain rounded-lg shadow-md hover:shadow-lg transition-all duration-300 hover:scale-110 cursor-pointer"/>
        </div>
        <div class="flex justify-center">
            <img src="/pictures/klient/logo/2.png" alt="Клиент 2" class="client-logo h-40 w-auto object-contain rounded-lg shadow-md hover:shadow-lg transition-all duration-300 hover:scale-110 cursor-pointer"/>
        </div>
        <div class="flex justify-center">
            <img src="/pictures/klient/logo/3.png" alt="Клиент 3" class="client-logo h-40 w-auto object-contain rounded-lg shadow-md hover:shadow-lg transition-all duration-300 hover:scale-110 cursor-pointer"/>
        </div>
        <div class="flex justify-center">
            <img src="/pictures/klient/logo/4.png" alt="Клиент 4" class="client-logo h-40 w-auto object-contain rounded-lg shadow-md hover:shadow-lg transition-all duration-300 hover:scale-110 cursor-pointer"/>
        </div>
        <div class="flex justify-center">
            <img src="/pictures/klient/logo/5.png" alt="Клиент 5" class="client-logo h-40 w-auto object-contain rounded-lg shadow-md hover:shadow-lg transition-all duration-300 hover:scale-110 cursor-pointer"/>
        </div>
        <div class="flex justify-center">
            <img src="/pictures/klient/logo/6.png" alt="Клиент 6" class="client-logo h-40 w-auto object-contain rounded-lg shadow-md hover:shadow-lg transition-all duration-300 hover:scale-110 cursor-pointer"/>
        </div>
        <div class="flex justify-center">
            <img src="/pictures/klient/logo/7.png" alt="Клиент 7" class="client-logo h-40 w-auto object-contain rounded-lg shadow-md hover:shadow-lg transition-all duration-300 hover:scale-110 cursor-pointer"/>
        </div>
        <div class="flex justify-center">
            <img src="/pictures/klient/logo/8.png" alt="Клиент 8" class="h-40 w-auto object-contain rounded-lg shadow-md hover:shadow-lg transition-all duration-300 hover:scale-110 cursor-pointer"/>
        </div>
    </div>
    

    
    <!-- Модальные окна с отзывами клиентов -->
    <!-- Модальное окно для клиента 1 -->
    <div id="modal-client-1" class="modal">
        <div class="modal-box max-w-lg max-h-[80vh] overflow-y-auto">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-2xl font-bold text-cyan-700">Отзыв клиента</h3>
                <button onclick="closeModal('modal-client-1')" class="btn btn-sm btn-circle btn-ghost hover:bg-red-100 hover:text-red-600 transition-colors">✕</button>
            </div>
            <div class="text-center">
                <img src="/pictures/klient/otzivi/1.png" alt="Отзыв клиента 1" class="max-w-full h-auto mx-auto rounded-lg shadow-xl hover:shadow-2xl transition-shadow duration-300"/>
            </div>
        </div>
    </div>
    
    <!-- Модальное окно для клиента 2 -->
    <div id="modal-client-2" class="modal">
        <div class="modal-box max-w-lg max-h-[80vh] overflow-y-auto">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-2xl font-bold text-cyan-700">Отзыв клиента</h3>
                <button onclick="closeModal('modal-client-2')" class="btn btn-sm btn-circle btn-ghost hover:bg-red-100 hover:text-red-600 transition-colors">✕</button>
            </div>
            <div class="text-center">
                <img src="/pictures/klient/otzivi/2.png" alt="Отзыв клиента 2" class="max-w-full h-auto mx-auto rounded-lg shadow-xl hover:shadow-2xl transition-shadow duration-300"/>
            </div>
        </div>
    </div>
    
    <!-- Модальное окно для клиента 3 -->
    <div id="modal-client-3" class="modal">
        <div class="modal-box max-w-lg max-h-[80vh] overflow-y-auto">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-2xl font-bold text-cyan-700">Отзыв клиента</h3>
                <button onclick="closeModal('modal-client-3')" class="btn btn-sm btn-circle btn-ghost hover:bg-red-100 hover:text-red-600 transition-colors">✕</button>
            </div>
            <div class="text-center">
                <img src="/pictures/klient/otzivi/3.png" alt="Отзыв клиента 3" class="max-w-full h-auto mx-auto rounded-lg shadow-xl hover:shadow-2xl transition-shadow duration-300"/>
            </div>
        </div>
    </div>
    
    <!-- Модальное окно для клиента 4 -->
    <div id="modal-client-4" class="modal">
        <div class="modal-box max-w-lg max-h-[80vh] overflow-y-auto">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-2xl font-bold text-cyan-700">Отзыв клиента</h3>
                <button onclick="closeModal('modal-client-4')" class="btn btn-sm btn-circle btn-ghost hover:bg-red-100 hover:text-red-600 transition-colors">✕</button>
            </div>
            <div class="text-center">
                <img src="/pictures/klient/otzivi/4.png" alt="Отзыв клиента 4" class="max-w-full h-auto mx-auto rounded-lg shadow-xl hover:shadow-2xl transition-shadow duration-300"/>
            </div>
        </div>
    </div>
    
    <!-- Модальное окно для клиента 5 -->
    <div id="modal-client-5" class="modal">
        <div class="modal-box max-w-lg max-h-[80vh] overflow-y-auto">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-2xl font-bold text-cyan-700">Отзыв клиента</h3>
                <button onclick="closeModal('modal-client-5')" class="btn btn-sm btn-circle btn-ghost hover:bg-red-100 hover:text-red-600 transition-colors">✕</button>
            </div>
            <div class="text-center">
                <img src="/pictures/klient/otzivi/5.png" alt="Отзыв клиента 5" class="max-w-full h-auto mx-auto rounded-lg shadow-xl hover:shadow-2xl transition-shadow duration-300"/>
            </div>
        </div>
    </div>
    
    <!-- Модальное окно для клиента 6 -->
    <div id="modal-client-6" class="modal">
        <div class="modal-box max-w-2xl max-h-[80vh] overflow-y-auto">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-2xl font-bold text-cyan-700">Отзыв клиента</h3>
                <button onclick="closeModal('modal-client-6')" class="btn btn-sm btn-circle btn-ghost hover:bg-red-100 hover:text-red-600 transition-colors">✕</button>
            </div>
            <div class="text-center">
                <img src="/pictures/klient/otzivi/6.png" alt="Отзыв клиента 6" class="max-w-full h-auto mx-auto rounded-lg shadow-xl hover:shadow-2xl transition-shadow duration-300"/>
            </div>
        </div>
    </div>
    
    <!-- Модальное окно для клиента 7 -->
    <div id="modal-client-7" class="modal">
        <div class="modal-box max-w-lg max-h-[80vh] overflow-y-auto">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-2xl font-bold text-cyan-700">Отзыв клиента</h3>
                <button onclick="closeModal('modal-client-7')" class="btn btn-sm btn-circle btn-ghost hover:bg-red-100 hover:text-red-600 transition-colors">✕</button>
            </div>
            <div class="text-center">
                <img src="/pictures/klient/otzivi/7.png" alt="Отзыв клиента 7" class="max-w-full h-auto mx-auto rounded-lg shadow-xl hover:shadow-2xl transition-shadow duration-300"/>
            </div>
        </div>
    </div>
    
    <!-- Модальное окно для клиента 8 -->
    <div id="modal-client-8" class="modal">
        <div class="modal-box max-w-lg max-h-[80vh] overflow-y-auto">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-2xl font-bold text-cyan-700">Отзыв клиента</h3>
                <button onclick="closeModal('modal-client-8')" class="btn btn-sm btn-circle btn-ghost hover:bg-red-100 hover:text-red-600 transition-colors">✕</button>
            </div>
            <div class="text-center">
                <img src="/pictures/klient/otzivi/8.png" alt="Отзыв клиента 8" class="max-w-full h-auto mx-auto rounded-lg shadow-xl hover:shadow-2xl transition-shadow duration-300"/>
            </div>
        </div>
    </div>
</section>

<footer class="shadow-inner"> <!-- Закончено-->
    <div class="footer sm:footer-horizontal bg-neutral-50  p-10 mt-20 ">
        <nav>
            <h3 class="footer-title text-base font-medium">Каталог</h3>
            @foreach($catalogs as $catalog)
                <a href="/catalog/{{$catalog->id}}" class="text-sm">{{$catalog->name}}</a>
            @endforeach
        </nav>
        <nav>
            <h3 class="footer-title text-base font-medium">Адентина Сервис</h3>
            @if($world == 'aboute')
                <span class="text-base-200 text-sm">О нас</span>
            @else
                <a href="/aboute">О нас</a>
            @endif

            @if($world == 'delivery')
                <span class="text-base-200 text-sm">Доставка</span>
            @else
                <a href="/delivery">Доставка</a>
            @endif

            @if($world == 'contacts')
                <span class="text-base-200 text-sm">Контакты</span>
            @else
                <a href="/contacts">Контакты</a>
            @endif
        </nav>
        <nav>
            <h3 class="footer-title text-base font-medium">Контактная информация</h3>
            <p>Телефон: <a href="tel:+375296133169" class="hover:text-cyan-700 text-sm">+375 (29) 613-31-69</a></p>
            <p>Адрес: <a href="https://www.google.com/maps?q=Ваш+точный+адрес" target="_blank" rel="noopener noreferrer"
                         class="hover:text-cyan-700 text-sm">г. Минск, ул.Ваупшасова, 42А</a></p>
            <p>Режим работы: Пн-Пт 9:00-17:30</p>
        </nav>
    </div>
    <div class="footer bg-neutral-50 border-cyan-700 border-t px-10 py-4">
        <aside class="grid-flow-col items-center">
            
            <p>
                Сермяжко А. Н.
                <br/>
                Предоставление надежной технологии с 2025
            </p>
        </aside>
       
    </div>
</footer>

<script>

    




    // Улучшенное мобильное меню
            document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.querySelector('.lg\\:hidden .dropdown button');
            const mobileMenu = document.querySelector('.lg\\:hidden .dropdown-content');
            
            if (mobileMenuButton && mobileMenu) {
                mobileMenuButton.addEventListener('click', function() {
                    mobileMenu.classList.toggle('show');
                });
                
                // Закрытие меню при клике вне его
                document.addEventListener('click', function(e) {
                    if (!mobileMenuButton.contains(e.target) && !mobileMenu.contains(e.target)) {
                        mobileMenu.classList.remove('show');
                    }
                });
            }
            
            // Добавляем обработчики кликов для логотипов клиентов
            const clientLogos = document.querySelectorAll('img[src*="/pictures/klient/logo/"]');
            clientLogos.forEach((logo, index) => {
                logo.addEventListener('click', function() {
                    // Определяем номер клиента (1-8)
                    const clientNumber = index + 1;
                    openModal(`modal-client-${clientNumber}`);
                });
            });

            // Простая карусель - всего 3 строки!
            let currentIndex = 0;
            setInterval(() => {
                clientLogos.forEach((logo, i) => logo.style.opacity = i === currentIndex ? '1' : '0.5');
                currentIndex = (currentIndex + 1) % clientLogos.length;
            }, 1000);
        });


            

        
        
        // Функция открытия модального окна
        function openModal(modalId) {
            console.log(`Попытка открыть модальное окно: ${modalId}`);
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.classList.add('modal-open');
                console.log(`Модальное окно ${modalId} открыто`);
            } else {
                console.error(`Модальное окно ${modalId} не найдено`);
            }
        }
        
        // Функция закрытия модального окна
        function closeModal(modalId) {
            console.log(`Попытка закрыть модальное окно: ${modalId}`);
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.classList.remove('modal-open');
                console.log(`Модальное окно ${modalId} закрыто`);
            } else {
                console.error(`Модальное окно ${modalId} не найдено`);
            }
        }
        
        // Закрытие модального окна при клике вне его
        document.addEventListener('click', function(event) {
            const modals = document.querySelectorAll('.modal');
            modals.forEach(modal => {
                if (event.target === modal) {
                    modal.classList.remove('modal-open');
                }
            });
        });
        


        

        
        // Закрытие модального окна по клавише Escape
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                const openModals = document.querySelectorAll('.modal.modal-open');
                openModals.forEach(modal => {
                    modal.classList.remove('modal-open');
                });
            }
        });
        

        

        

        

        </script>

        @include('components.global-scripts')
</body>

</html>
