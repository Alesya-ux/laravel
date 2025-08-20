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
                
                <div class="dropdown">
                    <div tabindex="0" role="button" class="nav-link p-3  hover:text-cyan-700 rounded-md transition-colors duration-200 flex items-center">
                        Каталог
                        <svg class="h-4 w-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                    <ul tabindex="0" class="dropdown-content z-[100] menu shadow bg-neutral-50 rounded-box min-w-max mt-1">
                        @foreach($catalogs as $catalog)
                            <li><a href="/catalog/{{$catalog->id}}" class="max-w-[200px] text-wrap hover:text-cyan-700 transition-colors duration-200">{{$catalog->name}}</a></li>
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
            0%, 12.5% { opacity: 1; } /* 0-1.5 секунды - первая картинка */
            16.67%, 100% { opacity: 0; } /* 2-12 секунды - скрыта */
        }
        
        @keyframes imageCycle2 {
            0%, 12.5% { opacity: 0; } /* 0-1.5 секунды - скрыта */
            16.67%, 29.17% { opacity: 1; } /* 2-3.5 секунды - вторая картинка */
            33.33%, 100% { opacity: 0; } /* 4-12 секунды - скрыта */
        }
        
        @keyframes imageCycle3 {
            0%, 29.17% { opacity: 0; } /* 0-3.5 секунды - скрыта */
            33.33%, 45.83% { opacity: 1; } /* 4-5.5 секунды - третья картинка */
            50%, 100% { opacity: 0; } /* 6-12 секунды - скрыта */
        }
        
        @keyframes imageCycle4 {
            0%, 45.83% { opacity: 0; } /* 0-5.5 секунды - скрыта */
            50%, 62.5% { opacity: 1; } /* 6-7.5 секунды - четвертая картинка */
            66.67%, 100% { opacity: 0; } /* 8-12 секунды - скрыта */
        }
        
        @keyframes imageCycle5 {
            0%, 62.5% { opacity: 0; } /* 0-7.5 секунды - скрыта */
            66.67%, 79.17% { opacity: 1; } /* 8-9.5 секунды - пятая картинка */
            83.33%, 100% { opacity: 0; } /* 10-12 секунды - скрыта */
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
        
        /* Плавные переходы для всех изменений в header */
        .header-transition {
            transition: all 0.3s ease-in-out; /* Переход 0.3 сек для всех свойств с плавным ускорением/замедлением */
        }
        
        /* Стили для зафиксированного header при прокрутке */
        header.sticky {
            backdrop-filter: blur(8px);                                    /* Размытие фона под header'ом на 8px */
            background-color: rgba(250, 250, 250, 0.95);                  /* Полупрозрачный белый фон (95% непрозрачности) */
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06); /* Многослойная тень для глубины */
        }
        

        
        /* ========================================
           СТИЛИ ДЛЯ НАВИГАЦИОННЫХ ССЫЛОК
           ======================================== */
        
        /* Базовые стили для навигационных ссылок */
        .nav-link {
            position: relative;                    /* Относительное позиционирование для псевдоэлементов */
            transition: all 0.2s ease-in-out;     /* Плавные переходы 0.2 сек для всех свойств */
        }
        
        /* Псевдоэлемент для подчеркивания ссылок */
        .nav-link::after {
            content: '';                          /* Пустое содержимое псевдоэлемента */
            position: absolute;                   /* Абсолютное позиционирование относительно .nav-link */
            bottom: 0;                            /* Размещение внизу ссылки */
            left: 50%;                            /* Центрирование по горизонтали */
            width: 0;                             /* Начальная ширина 0 (невидимая линия) */
            height: 2px;                          /* Высота подчеркивания 2px */
            background-color: #0e7490;            /* Цвет подчеркивания (cyan-700) */
            transition: all 0.3s ease-in-out;     /* Плавный переход для анимации */
            transform: translateX(-50%);           /* Центрирование с учетом ширины элемента */
        }
        
        /* Анимация подчеркивания при наведении */
        .nav-link:hover::after {
            width: 100%;                          /* Расширение подчеркивания на всю ширину ссылки */
        }
        
        /* Стили для активных ссылок при наведении */
        .nav-link.bg-cyan-700:hover {
            color: white !important;              /* Белый текст при наведении на активную ссылку */
            background-color: #0e7490 !important; /* Сохраняем цвет фона при наведении */
        }
        
        /* Дополнительные стили для активных ссылок */
        .nav-link.bg-cyan-700 {
            color: white !important;              /* Принудительно белый текст для активных ссылок */
        }
        
        /* Отключаем hover эффекты для активных ссылок */
        .nav-link.bg-cyan-700:hover {
            color: white !important;              /* Белый текст при наведении */
            background-color: #0e7490 !important; /* Цвет фона при наведении */
        }
        
        /* Высокий приоритет для активных ссылок */
        a.nav-link.bg-cyan-700,
        a.nav-link.bg-cyan-700:hover,
        a.nav-link.bg-cyan-700:focus {
            color: white !important;              /* Белый текст всегда */
            background-color: #0e7490 !important; /* Цвет фона всегда */
        }
        
        /* ========================================
           АНИМАЦИЯ КОРЗИНЫ - ПОДПРЫГИВАНИЕ БЕЙДЖА
           ======================================== */
        
        /* Класс для анимации счетчика товаров в корзине */
        .cart-badge {
            animation: bounce 1s infinite;        /* Анимация подпрыгивания 1 сек, бесконечно */
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
        

        
        /* Стили для карусели клиентов */
        #clientCarousel {
            overflow: hidden;
            position: relative;
            width: 100%;
            background: linear-gradient(90deg, transparent 0%, rgba(255,255,255,0.1) 50%, transparent 100%);
            border-radius: 8px;
            padding: 20px 0;
        }
        
        #logoContainer {
            display: flex;
            animation: scroll 25s linear infinite;
            width: max-content;
            gap: 32px;
            align-items: center;
        }
        
        #logoContainer img {
            height: 100px;
            width: auto;
            object-fit: contain;
            filter: grayscale(20%);
            transition: all 0.3s ease;
        }
        
        #logoContainer img:hover {
            filter: grayscale(0%);
            transform: scale(1.1);
        }
        
        /* Анимация бесконечной прокрутки */
        @keyframes scroll {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(calc(-50% - 16px));
            }
        }
        
        /* Пауза анимации при наведении */
        #clientCarousel:hover #logoContainer {
            animation-play-state: paused;
        }
        
        /* Адаптивность для мобильных устройств */
        @media (max-width: 768px) {
            #logoContainer img {
                height: 80px;
            }
            
            #logoContainer {
                gap: 20px;
                animation-duration: 20s;
            }
        }
        
        /* Принудительный запуск анимации */
        @media (prefers-reduced-motion: no-preference) {
            .image-slide {
                animation-play-state: running;
            }
        }
        
        /* Немедленный запуск анимации при загрузке */
        .image-slide {
            animation-play-state: running !important;
            animation-delay: 0s !important;
        }
        
        /* Оптимизация для мобильных устройств */
        @media (max-width: 768px) {
            .image-slide {
                transition: opacity 0.15s ease-in-out;
            }
        }
        
        /* Уменьшенный размер анимации */
        .image-slide {
            width: 50% !important; /* Уменьшаем с w-3/4 до 60% */
            height: auto !important;
            max-width: 100% !important;
            max-height: 100% !important;
        }
        

       
    </style>
<section class="rounded-lg bg-neutral-50 shadow-lg p-8 max-w-[70%] mx-auto mt-10">
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
                    style="animation: imageCycle1 12s infinite;"
                >
                <img 
                    src="/pictures/obratnay/obratnay2.png" 
                    alt="Свяжитесь с нами" 
                    class="w-3/4 h-auto object-contain image-slide absolute opacity-0"
                    style="animation: imageCycle2 12s infinite;"
                >
                <img 
                    src="/pictures/obratnay/obratnay3.png" 
                    alt="Свяжитесь с нами" 
                    class="w-3/4 h-auto object-contain image-slide absolute opacity-0"
                    style="animation: imageCycle3 12s infinite;"
                >
                <img 
                    src="/pictures/obratnay/obratnay4.png" 
                    alt="Свяжитесь с нами" 
                    class="w-3/4 h-auto object-contain image-slide absolute opacity-0"
                    style="animation: imageCycle4 12s infinite;"
                >
                <img 
                    src="/pictures/obratnay/obratnay5.png" 
                    alt="Свяжитесь с нами" 
                    class="w-3/4 h-auto object-contain image-slide absolute opacity-0"
                    style="animation: imageCycle5 12s infinite;"
                >
            </div>
        </div>

        <!-- Правый див - Форма обратной связи -->
        <div class="bg-neutral-50 rounded-2xl shadow-xl p-8 hover-lift border border-cyan-700/20">
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

<section class="rounded-lg bg-neutral-50 shadow-lg p-4 max-w-[95%] mx-auto mt-10">
    <div class="ml-4 w-full lg:w-1/2 mb-4">
        <h2 class="text-2xl lg:text-3xl font-semibold text-center lg:text-left">Клиенты</h2>
    </div>
    
    <!-- Автоматическая карусель логотипов клиентов -->
    <div class="relative overflow-hidden" id="clientCarousel">
        <div class="flex py-4" id="logoContainer">
            <!-- Первый набор логотипов -->
            <div class="flex-shrink-0">
                <img src="/pictures/klient/logo/1.png" alt="Клиент 1" class="object-contain rounded-lg shadow-md hover:shadow-lg transition-all duration-300 hover:scale-110"/>
            </div>
            <div class="flex-shrink-0">
                <img src="/pictures/klient/logo/2.png" alt="Клиент 2" class="object-contain rounded-lg shadow-md hover:shadow-lg transition-all duration-300 hover:scale-110"/>
            </div>
            <div class="flex-shrink-0">
                <img src="/pictures/klient/logo/3.png" alt="Клиент 3" class="object-contain rounded-lg shadow-md hover:shadow-lg transition-all duration-300 hover:scale-110"/>
            </div>
            <div class="flex-shrink-0">
                <img src="/pictures/klient/logo/4.png" alt="Клиент 4" class="object-contain rounded-lg shadow-md hover:shadow-lg transition-all duration-300 hover:scale-110"/>
            </div>
            <div class="flex-shrink-0">
                <img src="/pictures/klient/logo/5.png" alt="Клиент 5" class="object-contain rounded-lg shadow-md hover:shadow-lg transition-all duration-300 hover:scale-110"/>
            </div>
            <div class="flex-shrink-0">
                <img src="/pictures/klient/logo/6.png" alt="Клиент 6" class="object-contain rounded-lg shadow-md hover:shadow-lg transition-all duration-300 hover:scale-110"/>
            </div>
            <div class="flex-shrink-0">
                <img src="/pictures/klient/logo/7.png" alt="Клиент 7" class="object-contain rounded-lg shadow-md hover:shadow-lg transition-all duration-300 hover:scale-110"/>
            </div>
            <div class="flex-shrink-0">
                <img src="/pictures/klient/logo/8.png" alt="Клиент 8" class="object-contain rounded-lg shadow-md hover:shadow-lg transition-all duration-300 hover:scale-110"/>
            </div>
            <!-- Дублируем логотипы для бесконечной прокрутки -->
            <div class="flex-shrink-0">
                <img src="/pictures/klient/logo/1.png" alt="Клиент 1" class="object-contain rounded-lg shadow-md hover:shadow-lg transition-all duration-300 hover:scale-110"/>
            </div>
            <div class="flex-shrink-0">
                <img src="/pictures/klient/logo/2.png" alt="Клиент 2" class="object-contain rounded-lg shadow-md hover:shadow-lg transition-all duration-300 hover:scale-110"/>
            </div>
            <div class="flex-shrink-0">
                <img src="/pictures/klient/logo/3.png" alt="Клиент 3" class="object-contain rounded-lg shadow-md hover:shadow-lg transition-all duration-300 hover:scale-110"/>
            </div>
            <div class="flex-shrink-0">
                <img src="/pictures/klient/logo/4.png" alt="Клиент 4" class="object-contain rounded-lg shadow-md hover:shadow-lg transition-all duration-300 hover:scale-110"/>
            </div>
            <div class="flex-shrink-0">
                <img src="/pictures/klient/logo/5.png" alt="Клиент 5" class="object-contain rounded-lg shadow-md hover:shadow-lg transition-all duration-300 hover:scale-110"/>
            </div>
            <div class="flex-shrink-0">
                <img src="/pictures/klient/logo/6.png" alt="Клиент 6" class="object-contain rounded-lg shadow-md hover:shadow-lg transition-all duration-300 hover:scale-110"/>
            </div>
            <div class="flex-shrink-0">
                <img src="/pictures/klient/logo/7.png" alt="Клиент 7" class="object-contain rounded-lg shadow-md hover:shadow-lg transition-all duration-300 hover:scale-110"/>
            </div>
            <div class="flex-shrink-0">
                <img src="/pictures/klient/logo/8.png" alt="Клиент 8" class="object-contain rounded-lg shadow-md hover:shadow-lg transition-all duration-300 hover:scale-110"/>
            </div>
        </div>
    </div>
    
    <!-- Модальные окна с отзывами клиентов -->
    <!-- Модальное окно для клиента 1 -->
    <div id="modal-client-1" class="modal">
        <div class="modal-box max-w-sm">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-xl font-bold text-cyan-700">Отзыв клиента</h3>
                <button onclick="closeModal('modal-client-1')" class="btn btn-sm btn-circle btn-ghost">✕</button>
            </div>
            <div class="text-center">
                <img src="/pictures/klient/otzivi/1.png" alt="Отзыв клиента 1" class="max-w-full h-auto mx-auto rounded-lg shadow-lg"/>
            </div>
        </div>
    </div>
    
    <!-- Модальное окно для клиента 2 -->
    <div id="modal-client-2" class="modal">
        <div class="modal-box max-w-sm">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-xl font-bold text-cyan-700">Отзыв клиента</h3>
                <button onclick="closeModal('modal-client-2')" class="btn btn-sm btn-circle btn-ghost">✕</button>
            </div>
            <div class="text-center">
                <img src="/pictures/klient/otzivi/2.png" alt="Отзыв клиента 2" class="max-w-full h-auto mx-auto rounded-lg shadow-lg"/>
            </div>
        </div>
    </div>
    
    <!-- Модальное окно для клиента 3 -->
    <div id="modal-client-3" class="modal">
        <div class="modal-box max-w-sm">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-xl font-bold text-cyan-700">Отзыв клиента</h3>
                <button onclick="closeModal('modal-client-3')" class="btn btn-sm btn-circle btn-ghost">✕</button>
            </div>
            <div class="text-center">
                <img src="/pictures/klient/otzivi/3.png" alt="Отзыв клиента 3" class="max-w-full h-auto mx-auto rounded-lg shadow-lg"/>
            </div>
        </div>
    </div>
    
    <!-- Модальное окно для клиента 4 -->
    <div id="modal-client-4" class="modal">
        <div class="modal-box max-w-sm">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-xl font-bold text-cyan-700">Отзыв клиента</h3>
                <button onclick="closeModal('modal-client-4')" class="btn btn-sm btn-circle btn-ghost">✕</button>
            </div>
            <div class="text-center">
                <img src="/pictures/klient/otzivi/4.png" alt="Отзыв клиента 4" class="max-w-full h-auto mx-auto rounded-lg shadow-lg"/>
            </div>
        </div>
    </div>
    
    <!-- Модальное окно для клиента 5 -->
    <div id="modal-client-5" class="modal">
        <div class="modal-box max-w-sm">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-xl font-bold text-cyan-700">Отзыв клиента</h3>
                <button onclick="closeModal('modal-client-5')" class="btn btn-sm btn-circle btn-ghost">✕</button>
            </div>
            <div class="text-center">
                <img src="/pictures/klient/otzivi/5.png" alt="Отзыв клиента 5" class="max-w-full h-auto mx-auto rounded-lg shadow-lg"/>
            </div>
        </div>
    </div>
    
    <!-- Модальное окно для клиента 6 -->
    <div id="modal-client-6" class="modal">
        <div class="modal-box max-w-sm">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-xl font-bold text-cyan-700">Отзыв клиента</h3>
                <button onclick="closeModal('modal-client-6')" class="btn btn-sm btn-circle btn-ghost">✕</button>
            </div>
            <div class="text-center">
                <img src="/pictures/klient/otzivi/6.png" alt="Отзыв клиента 6" class="max-w-full h-auto mx-auto rounded-lg shadow-lg"/>
            </div>
        </div>
    </div>
    
    <!-- Модальное окно для клиента 7 -->
    <div id="modal-client-7" class="modal">
        <div class="modal-box max-w-sm">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-xl font-bold text-cyan-700">Отзыв клиента</h3>
                <button onclick="closeModal('modal-client-7')" class="btn btn-sm btn-circle btn-ghost">✕</button>
            </div>
            <div class="text-center">
                <img src="/pictures/klient/otzivi/7.png" alt="Отзыв клиента 7" class="max-w-full h-auto mx-auto rounded-lg shadow-lg"/>
            </div>
        </div>
    </div>
    
    <!-- Модальное окно для клиента 8 -->
    <div id="modal-client-8" class="modal">
        <div class="modal-box max-w-sm">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-xl font-bold text-cyan-700">Отзыв клиента</h3>
                <button onclick="closeModal('modal-client-8')" class="btn btn-sm btn-circle btn-ghost">✕</button>
            </div>
            <div class="text-center">
                <img src="/pictures/klient/otzivi/8.png" alt="Отзыв клиента 8" class="max-w-full h-auto mx-auto rounded-lg shadow-lg"/>
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

    


    // Анимация для корзины
    const cartButton = document.querySelector('a[href="/cart"]');
    if (cartButton) {
        cartButton.addEventListener('click', function(e) {
            // Добавляем анимацию клика
            this.style.transform = 'scale(0.95)';
            setTimeout(() => {
                this.style.transform = 'scale(1)';
            }, 150);
        });
    }

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
    });

            // Анимация для навигационных ссылок
        document.addEventListener('DOMContentLoaded', function() {
            const navLinks = document.querySelectorAll('.nav-link');
            navLinks.forEach(link => {
                link.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-2px)';
                });
                
                link.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });
            
            // Добавляем обработчики кликов для логотипов клиентов
            const clientLogos = document.querySelectorAll('#logoContainer img');
            clientLogos.forEach((logo, index) => {
                logo.addEventListener('click', function() {
                    // Определяем номер клиента (1-8)
                    const clientNumber = (index % 8) + 1;
                    openModal(`modal-client-${clientNumber}`);
                });
                
                // Добавляем курсор-указатель для логотипов
                logo.style.cursor = 'pointer';
            });
            
            // Инициализация карусели
            initCarousel();
        });
        
        // Функция открытия модального окна
        function openModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.classList.add('modal-open');
            }
        }
        
        // Функция закрытия модального окна
        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.classList.remove('modal-open');
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
        
        // Функция инициализации карусели
        function initCarousel() {
            const logoContainer = document.getElementById('logoContainer');
            const carousel = document.getElementById('clientCarousel');
            
            if (logoContainer && carousel) {
                // Добавляем плавную анимацию
                logoContainer.style.transition = 'transform 0.5s ease-in-out';
                
                // Обработчик для паузы при наведении
                carousel.addEventListener('mouseenter', function() {
                    logoContainer.style.animationPlayState = 'paused';
                });
                
                carousel.addEventListener('mouseleave', function() {
                    logoContainer.style.animationPlayState = 'running';
                });
                
                // Добавляем индикатор загрузки
                logoContainer.style.opacity = '0';
                setTimeout(() => {
                    logoContainer.style.opacity = '1';
                    logoContainer.style.transition = 'opacity 0.5s ease-in-out';
                }, 100);
                
                // Добавляем плавное появление анимации
                setTimeout(() => {
                    logoContainer.style.animation = 'scroll 25s linear infinite';
                }, 500);
                
                // Обработчик для сброса анимации при видимости
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            logoContainer.style.animationPlayState = 'running';
                        } else {
                            logoContainer.style.animationPlayState = 'paused';
                        }
                    });
                }, { threshold: 0.1 });
                
                observer.observe(carousel);
            }
        }
        
        // Функция инициализации слайдера изображений
        function initImageSlider() {
            const imageSlides = document.querySelectorAll('.image-slide');
            
            if (imageSlides.length > 0) {
                // Принудительно запускаем анимацию для всех изображений
                imageSlides.forEach((slide, index) => {
                    // Убираем любые задержки
                    slide.style.animationDelay = '0s';
                    slide.style.animationPlayState = 'running';
                    
                    // Принудительно показываем первое изображение
                    if (index === 0) {
                        slide.style.opacity = '1';
                        slide.style.animation = 'imageCycle1 12s infinite';
                    }
                });
                
                // Принудительно запускаем анимацию через небольшую задержку
                setTimeout(() => {
                    imageSlides.forEach(slide => {
                        slide.style.animationPlayState = 'running';
                    });
                }, 50);
            }
        }
        
        // Запускаем слайдер при загрузке страницы
        document.addEventListener('DOMContentLoaded', function() {
            initImageSlider();
        });
        
        // Также запускаем при полной загрузке страницы
        window.addEventListener('load', function() {
            initImageSlider();
        });
        

        

        

        </script>

        @include('components.global-scripts')
</body>

</html>
