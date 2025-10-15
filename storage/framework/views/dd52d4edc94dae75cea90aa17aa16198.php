<?php $__env->startPush('head'); ?>
    <meta name="description" content="Каталог товаров и услуг. Найдите нужную категорию или товар в нашем обширном каталоге.">
    <meta name="keywords" content="каталог, товары, категории, покупки, магазин">
    <meta property="og:title" content="Каталог товаров">
    <meta property="og:description" content="Обширный каталог товаров и услуг">
    <meta property="og:type" content="website">
    <link rel="canonical" href="<?php echo e(url()->current()); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <main class="min-h-screen">
        <!-- Заголовок страницы -->
        <header>
        <div class = "p-6 ">
            <h2 class="text-3xl font-semibold">Каталог товаров</h2>
            Выберите интересующую вас категорию
        </div>
        </header>
        

        <!-- Основной контент -->
        <section class="rounded-lg bg-neutral-50 shadow-lg p-10 max-w-[95%] mx-auto  fade-in">
            <div class="container mx-auto px-4">
                <?php if($catalogs->count() > 0): ?>
                    <!-- Сетка каталогов -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                        <?php $__currentLoopData = $catalogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $catalog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if (isset($component)) { $__componentOriginal6adbfcb3bd445741456451d8098a87e8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6adbfcb3bd445741456451d8098a87e8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.catalog-card','data' => ['catalog' => $catalog]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('catalog-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['catalog' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($catalog)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6adbfcb3bd445741456451d8098a87e8)): ?>
<?php $attributes = $__attributesOriginal6adbfcb3bd445741456451d8098a87e8; ?>
<?php unset($__attributesOriginal6adbfcb3bd445741456451d8098a87e8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6adbfcb3bd445741456451d8098a87e8)): ?>
<?php $component = $__componentOriginal6adbfcb3bd445741456451d8098a87e8; ?>
<?php unset($__componentOriginal6adbfcb3bd445741456451d8098a87e8); ?>
<?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php else: ?>
                    <!-- Пустое состояние -->
                    <div class="text-center py-16">
                        <div class="w-24 h-24 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Каталог пуст</h3>
                        <p class="text-gray-600">В данный момент категории не добавлены</p>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.tall', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\laravel\resources\views/catalogs.blade.php ENDPATH**/ ?>