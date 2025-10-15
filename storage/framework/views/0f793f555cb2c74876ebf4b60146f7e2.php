<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <?php $__env->startSection('title', 'Профиль'); ?>
    
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-bold text-2xl text-gray-800 leading-tight">
            Профиль
        </h2>
     <?php $__env->endSlot(); ?>

    <!-- Серый фон -->
    <div class="min-h-screen bg-base-200 py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Карточка информации профиля -->
            <div class="p-8 sm:p-10 bg-neutral-100 shadow-lg rounded-lg fade-in card-hover">
                <div class="flex items-center space-x-3  ">
                    <div class="p-3 bg-cyan-700 rounded shadow-md ">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800">Информация профиля</h3>
                </div>
                <div class="mt-6">
                <?php echo $__env->make('profile.partials.update-profile-information-form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </div>
            </div>

            <!-- Карточка смены пароля -->
            <div class="p-8 sm:p-10 bg-neutral-50 shadow-lg rounded-lg fade-in card-hover">
                <div class="flex items-center space-x-3 mb-6">
                    <div class="p-3 bg-cyan-700 rounded shadow-md">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800">Безопасность</h3>
                </div>
                <div class="mt-6">
                <?php echo $__env->make('profile.partials.update-password-form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </div>
            </div>

        </div>
    </div>

    <!-- Дополнительные стили для страницы профиля -->
    <style>
        /* Анимация появления карточек */
        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 0.8s ease-out forwards;
        }

        .fade-in:nth-child(1) { animation-delay: 0.1s; }
        .fade-in:nth-child(2) { animation-delay: 0.2s; }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Улучшенные hover эффекты для карточек */
        .card-hover {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .card-hover:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
        }

        /* Стили для форм внутри карточек */
        .card-hover input,
        .card-hover textarea,
        .card-hover select {
            transition: all 0.3s ease;
            border: 2px solid #e5e7eb;
        }

        .card-hover input:focus,
        .card-hover textarea:focus,
        .card-hover select:focus {
            border-color: #dc2626;
            box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.1);
            transform: translateY(-1px);
        }

        /* Стили для кнопок с красным акцентом */
        .card-hover .btn {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .card-hover .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }

        .card-hover .btn:hover::before {
            left: 100%;
        }

        .card-hover .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        /* Красные кнопки */
        .card-hover .btn-primary,
        .card-hover .btn-danger {
            background-color: #dc2626;
            border-color: #dc2626;
        }

        .card-hover .btn-primary:hover,
        .card-hover .btn-danger:hover {
            background-color: #b91c1c;
            border-color: #b91c1c;
        }

        /* Адаптивность для мобильных устройств */
        @media (max-width: 768px) {
            .card-hover:hover {
                transform: translateY(-4px) scale(1.01);
            }
            
            .fade-in {
                animation-delay: 0s !important;
            }
        }

        /* Плавная прокрутка для якорных ссылок */
        html {
            scroll-behavior: smooth;
        }

        /* Серые тени для карточек */
        .card-hover {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        .card-hover:hover {
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
    </style>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\laragon\www\laravel\resources\views/profile/edit.blade.php ENDPATH**/ ?>