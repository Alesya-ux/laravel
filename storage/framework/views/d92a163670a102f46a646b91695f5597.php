<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link type="image/x-icon" rel="shortcut icon" href="pictures/logo/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.23/dist/full.min.css" rel="stylesheet" type="text/css"/>
    <script src="https://cdn.tailwindcss.com"></script>
    <?php echo $__env->make('components.global-styles', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    
    <!-- Кастомные стили для выпадающего меню -->
    <style>
        /* Основные стили для выпадающего меню */
        .dropdown-container {
            position: relative;
        }
        
        .dropdown-menu {
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 1000;
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 0.5rem;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            min-width: 320px; /* Еще больше увеличили минимальную ширину */
            max-height: 60vh;
            overflow-y: auto;
            overflow-x: hidden; /* Скрываем горизонтальный скролл */
            
            /* Анимация появления */
            opacity: 0;
            visibility: hidden;
            transform: translateY(-8px);
            transition: all 0.2s ease-in-out;
        }
        
        /* Показываем меню при наведении */
        .dropdown-container:hover .dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
        
        /* Поворачиваем стрелку при наведении */
        .dropdown-container:hover svg {
            transform: rotate(180deg);
        }
        
        /* Стили для элементов меню */
        .dropdown-item {
            display: block;
            padding: 6px 30px; /* Еще больше увеличили отступы до 30px */
            color: #374151;
            text-decoration: none;
            border-bottom: 1px solid #f3f4f6;
            transition: all 0.2s ease-in-out;
            font-size: 0.875rem; /* 14px */
            line-height: 1.25rem; /* 20px */
            white-space: nowrap; /* Не переносить текст */
            overflow: hidden;
            text-overflow: ellipsis; /* Многоточие для длинного текста */
            transform-origin: left center; /* Точка масштабирования слева */
        }
        
        .dropdown-item:last-child {
            border-bottom: none;
        }
        
        .dropdown-item:hover {
            color: #0891b2; /* Только изменение цвета текста на cyan-700 */
        }
        
        /* Кастомная прокрутка */
        .dropdown-menu::-webkit-scrollbar {
            width: 6px;
        }
        
        .dropdown-menu::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 3px;
        }
        
        .dropdown-menu::-webkit-scrollbar-thumb {
            background: #0891b2;
            border-radius: 3px;
        }
        
        .dropdown-menu::-webkit-scrollbar-thumb:hover {
            background: #0e7490;
        }
        
        /* Для Firefox */
        .dropdown-menu {
            scrollbar-width: thin;
            scrollbar-color: #0891b2 #f1f5f9;
        }
        
        /* Адаптивность для мобильных устройств */
        @media (max-width: 1024px) {
            .dropdown-menu {
                position: static;
                opacity: 1;
                visibility: visible;
                transform: none;
                box-shadow: none;
                border: none;
                max-height: none;
                overflow: visible;
            }
            
            /* Стили для мобильного меню каталога */
            .dropdown-content .dropdown-item {
                font-size: 0.8rem; /* 12.8px для мобильных */
                padding: 4px 24px; /* Еще больше увеличили отступы для мобильных */
            }
        }
        
        /* Выравнивание влево для маленьких экранов */
        @media (max-width: 768px) {
            .dropdown-menu {
                left: auto;
                right: 0;
                transform-origin: top right;
                min-width: 200px; /* Уменьшаем минимальную ширину для мобильных */
            }
        }
        
        /* Для очень маленьких экранов - полная ширина */
        @media (max-width: 480px) {
            .dropdown-menu {
                left: 0;
                right: 0;
                min-width: 100%;
                transform-origin: top left;
            }
        }
        
        /* Дополнительная проверка для планшетов */
        @media (max-width: 1024px) and (min-width: 769px) {
            .dropdown-menu {
                /* На планшетах оставляем стандартное выравнивание */
                left: 0;
                right: auto;
                transform-origin: top left;
            }
        }
        
        /* Дополнительные улучшения */
        .dropdown-container {
            /* Обеспечиваем правильное позиционирование */
            display: inline-block;
        }
        
        /* Улучшенная анимация для стрелки */
        .dropdown-container svg {
            transition: transform 0.2s ease-in-out;
        }
        
        /* Фокус для доступности - только изменение цвета */
        .dropdown-item:focus {
            outline: none;
            color: #0891b2;
        }
        
        /* Улучшенная тень при наведении */
        .dropdown-container:hover .dropdown-menu {
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
    </style>
    
    <title>АДЕНТИНА СЕРВИС</title>
    <meta name="description" content="Компания АДЕНТИНА СЕРВИС осуществляет продажу дезматов и дезковриков,генераторов холодного и горячего тумана,а также доставку продукции во все Беларуси"> <!-- Сделать описание компании -->
    <meta name="keywords" content="дезковрики, дезковрик, дезматы, дезинфектанты, дезинфекционные коврики,генераторы горячего тумана, дезустановка, дустер, дозатор сенсорный, дозатор локтевой, генераторы холодного тумана "><!-- Записать ключевые слова -->
    
    <?php echo $__env->yieldPushContent('styles'); ?>
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
                <?php if(auth()->guard()->guest()): ?>
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
                <?php else: ?>
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
                                <form method="POST" action="<?php echo e(route('logout')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="w-full text-left text-cyan-700 hover:text-cyan-700 transition-colors duration-200">
                                        Выход
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Навигационное меню -->
        <div class="flex items-center justify-between px-4 py-2">
            <!-- Основное меню -->
            <div class="hidden lg:flex items-center space-x-1">
                <a href="/" class="nav-link p-3  hover:text-cyan-700 rounded-md transition-colors duration-200 <?php echo e($world == 'home' ? 'bg-cyan-700 text-white' : ''); ?>">
                    Главная
                </a>
                
                <!-- ========================================
                     ВЫПАДАЮЩЕЕ МЕНЮ КАТАЛОГА (ЧИСТЫЙ CSS)
                     ======================================== -->
                <div class="dropdown-container">
                    <!-- ССЫЛКА-ТРИГГЕР ДЛЯ ВЫПАДАЮЩЕГО МЕНЮ -->
                    <a href="/catalog" class="nav-link p-3 hover:text-cyan-700 rounded-md transition-colors duration-200 flex items-center">
                        Каталог
                        <svg class="h-4 w-4 ml-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </a>
                    
                    <!-- ВЫПАДАЮЩЕЕ МЕНЮ С ПОДКАТЕГОРИЯМИ -->
                    <ul class="dropdown-menu">
                        <?php $__currentLoopData = $catalogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $catalog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <a href="/catalog/<?php echo e($catalog->id); ?>" class="dropdown-item">
                                    <?php echo e($catalog->name); ?>

                                </a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>

                <a href="/aboute" class="nav-link p-3  hover:text-cyan-700 rounded-md transition-colors duration-200 <?php echo e($world == 'aboute' ? 'bg-cyan-700 text-white' : ''); ?>">
                    О нас
                </a>

                <a href="/delivery" class="nav-link p-3  hover:text-cyan-700 rounded-md transition-colors duration-200 <?php echo e($world == 'delivery' ? 'bg-cyan-700 text-white' : ''); ?>">
                    Доставка
                </a>

                <a href="/contacts" class="nav-link p-3  hover:text-cyan-700 rounded-md transition-colors duration-200 <?php echo e($world == 'contacts' ? 'bg-cyan-700 text-white' : ''); ?>">
                    Контакты
                </a>
            </div>

            <!-- Мобильное меню -->
            <div class="lg:hidden ml-auto">
                <div class="dropdown dropdown-end">
                    <div tabindex="0" role="button" class="btn btn-square btn-ghost">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </div>
                    <ul tabindex="0" class="dropdown-content z-[100] menu shadow bg-neutral-50 rounded-box min-w-max mt-1 p-1 max-h-[60vh] overflow-y-auto dropdown-menu">
                        <li><a href="/" class="hover:text-cyan-700 transition-colors duration-200">Главная</a></li>
                        <li>
                            <details>
                                <summary class="hover:text-cyan-700 transition-colors duration-200">Каталог</summary>
                                <ul>
                                    <?php $__currentLoopData = $catalogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $catalog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><a href="/catalog/<?php echo e($catalog->id); ?>" class="pl-4 hover:text-cyan-700 transition-colors duration-200"><?php echo e($catalog->name); ?></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<?php echo $__env->yieldContent('content'); ?>

<style>
        /* Анимация смены изображений */
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
            0%, 12.5% { opacity: 1; }
            16.67%, 100% { opacity: 0; }
        }
        
        @keyframes imageCycle2 {
            0%, 12.5% { opacity: 0; }
            16.67%, 29.17% { opacity: 1; }
            33.33%, 100% { opacity: 0; }
        }
        
        @keyframes imageCycle3 {
            0%, 29.17% { opacity: 0; }
            33.33%, 45.83% { opacity: 1; }
            50%, 100% { opacity: 0; }
        }
        
        @keyframes imageCycle4 {
            0%, 45.83% { opacity: 0; }
            50%, 62.5% { opacity: 1; }
            66.67%, 100% { opacity: 0; }
        }
        
        @keyframes imageCycle5 {
            0%, 62.5% { opacity: 0; }
            66.67%, 79.17% { opacity: 1; }
            83.33%, 100% { opacity: 0; }
        }
        

        
        /* Анимация пульсации */
        @keyframes pulse {
            0% {
                transform: scale(1);
                opacity: 1;
            }
            50% {
                transform: scale(1.05);
                opacity: 0.8;
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        .pulse {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
        
       
        /* Стили для header */
        .header-transition {
            transition: all 0.3s ease-in-out;
        }
        
        header.sticky {
            backdrop-filter: blur(8px);
            background-color: rgba(250, 250, 250, 0.95);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        

        
        /* Стили для навигационных ссылок */
        .nav-link {
            position: relative;
            transition: all 0.2s ease-in-out, transform 0.2s ease-in-out;
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background-color: #0e7490;
            transition: all 0.3s ease-in-out;
            transform: translateX(-50%);
        }
        
        .nav-link:hover::after {
            width: 100%;
        }
        
        .nav-link.bg-cyan-700,
        .nav-link.bg-cyan-700:hover,
        .nav-link.bg-cyan-700:focus {
            color: white !important;
            background-color: #0e7490 !important;
        }

        .nav-link:hover {
            transform: translateY(-2px);
        }
        
        /* Анимация корзины */
        .cart-badge {
            animation: bounce 1s infinite;
        }

        a[href="/cart"] {
            transition: transform 0.15s ease-in-out;
        }

        a[href="/cart"]:active {
            transform: scale(0.95);
        }
        
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-3px);
            }
            60% {
                transform: translateY(-2px);
            }
        }
        
        /* Анимация логотипа */
        .logo-spin {
            animation: spin 8s linear infinite;
        }
        
        .logo-spin:hover {
            animation: spin 2s linear infinite;
        }
        
        @keyframes spin {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }
        
        /* Модальные окна */
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
        
        /* Мобильная оптимизация */
        @media (max-width: 768px) {
            .image-slide {
                transition: opacity 0.15s ease-in-out;
            }
        }
        
        .image-slide {
            width: 75%;
            height: auto;
            max-width: 100%;
            max-height: 100%;
        }
        
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
        
        .modal-box {
            width: auto !important;
            min-width: 400px;
            max-width: 90vw !important;
        }
</style>

    <!-- Обратная связь-->
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
            <div class="bg-neutral-50 rounded-2xl shadow-xl p-8 hover-lift duration-300 border border-cyan-700/20 ">
                <h3 class="text-2xl font-bold text-cyan-700 mb-6">Свяжитесь с нами</h3>
                
                <div class="mb-6">
                    <p class="text-base-content/80">
                        Оставьте свои контактные данные, и мы свяжемся с вами!
                    </p>
                </div>

                <!-- Сообщения -->
                <?php if(session('success')): ?>
                    <div class="alert alert-success mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <span><?php echo e(session('success')); ?></span>
                    </div>
                <?php endif; ?>

                <?php if(session('error')): ?>
                    <div class="alert alert-error mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <span><?php echo e(session('error')); ?></span>
                    </div>
                <?php endif; ?>
                
                <form action="<?php echo e(route('contact.submit')); ?>" method="POST" class="space-y-6">
                    <?php echo csrf_field(); ?>
                    <!-- Имя -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-cyan-700 mb-2">
                            Ваше имя <span class="text-error">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="name" 
                            name="name" 
                            value="<?php echo e(old('name')); ?>"
                            required
                            class="input input-bordered w-full border-cyan-700/30 focus:border-cyan-700 focus:ring-2 focus:ring-cyan-700/20 transition-all duration-300 <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            placeholder="Введите ваше имя"
                        >
                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="text-error text-sm mt-1"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
                            value="<?php echo e(old('phone')); ?>"
                            required
                            class="input input-bordered w-full border-cyan-700/30 focus:border-cyan-700 focus:ring-2 focus:ring-cyan-700/20 transition-all duration-300 <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            placeholder="(29) 123-45-67"
                        >
                        <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="text-error text-sm mt-1"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- Сообщение -->
                    <div>
                        <label for="message" class="block text-sm font-medium text-cyan-700 mb-2">
                            Сообщение (необязательно)
                        </label>
                        <textarea 
                            id="message" 
                            name="message"
                            rows="4"
                            class="textarea textarea-bordered w-full border-cyan-700/30 focus:border-cyan-700 focus:ring-2 focus:ring-cyan-700/20 transition-all duration-300 <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            placeholder="Опишите ваш вопрос или пожелания..."
                        ><?php echo e(old('message')); ?></textarea>
                        <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="text-error text-sm mt-1"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
                            <span>sermyazhko.alesya@mail.ru</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Карусель логотипов-->
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

    <footer class="shadow-inner">
        <div class="footer sm:footer-horizontal bg-neutral-50 p-10 mt-20">
            <nav>
                <h3 class="footer-title text-base font-medium">Каталог</h3>
                <?php $__currentLoopData = $catalogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $catalog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="/catalog/<?php echo e($catalog->id); ?>" class="text-sm"><?php echo e($catalog->name); ?></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </nav>
            <nav>
                <h3 class="footer-title text-base font-medium">Адентина Сервис</h3>
                <?php if($world == 'aboute'): ?>
                    <span class="text-base-200 text-sm">О нас</span>
                <?php else: ?>
                    <a href="/aboute">О нас</a>
                <?php endif; ?>

                <?php if($world == 'delivery'): ?>
                    <span class="text-base-200 text-sm">Доставка</span>
                <?php else: ?>
                    <a href="/delivery">Доставка</a>
                <?php endif; ?>

                <?php if($world == 'contacts'): ?>
                    <span class="text-base-200 text-sm">Контакты</span>
                <?php else: ?>
                    <a href="/contacts">Контакты</a>
                <?php endif; ?>
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

    <?php echo $__env->make('components.global-scripts', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</body>
</html>
<?php /**PATH C:\laragon\www\laravel\resources\views/layouts/tall.blade.php ENDPATH**/ ?>