<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @include('components.global-styles')
        
        <!-- CSS анимации для картинок -->
        <style>
             /* Анимация смены изображений */
        .image-slide:first-child {
            opacity: 1 !important;
            animation-play-state: running;
        }
        
        /* Кастомные стили для полей ввода */
        input:focus {
            border-color: #0e7490 !important;
            box-shadow: 0 0 0 1px #0e7490 !important;
        }
        
        input:focus-visible {
            outline: 2px solid #0e7490 !important;
            outline-offset: 2px !important;
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
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0"
       
        <div class="w-full max-w-4xl mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                <!-- Левая колонка: Анимированные картинки без фона -->
                <div class="relative group flex justify-start items-center">
                    <div class="relative overflow-hidden flex items-center justify-center h-96 w-96 -ml-12">
                        <img 
                            src="/pictures/obratnay/obratnay1.png" 
                            alt="Регистрация" 
                            class="w-full h-auto object-contain image-slide absolute opacity-100"
                            style="animation: imageCycle1 6s infinite;"
                        >
                        <img 
                            src="/pictures/obratnay/obratnay2.png" 
                            alt="Регистрация" 
                            class="w-full h-auto object-contain image-slide absolute opacity-0"
                            style="animation: imageCycle2 6s infinite;"
                        >
                        <img 
                            src="/pictures/obratnay/obratnay3.png" 
                            alt="Регистрация" 
                            class="w-full h-auto object-contain image-slide absolute opacity-0"
                            style="animation: imageCycle3 6s infinite;"
                        >
                        <img 
                            src="/pictures/obratnay/obratnay4.png" 
                            alt="Регистрация" 
                            class="w-full h-auto object-contain image-slide absolute opacity-0"
                            style="animation: imageCycle4 6s infinite;"
                        >
                        <img 
                            src="/pictures/obratnay/obratnay5.png" 
                            alt="Регистрация" 
                            class="w-full h-auto object-contain image-slide absolute opacity-0"
                            style="animation: imageCycle5 6s infinite;"
                        >
                    </div>
                </div>

                <!-- Правая колонка: Форма регистрации -->
                <div class="w-full sm:max-w-xl px-10 py-8 bg-white shadow-md overflow-hidden sm:rounded-lg">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>

    @include('components.global-scripts')
    </body>


</html>
