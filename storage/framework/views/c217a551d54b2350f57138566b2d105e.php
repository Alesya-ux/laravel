<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['catalog']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['catalog']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<article class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 border border-gray-100 overflow-hidden">
    <!-- Изображение -->
    <div class="relative h-48 overflow-hidden bg-gray-50">
        <?php if($catalog->picture && file_exists(public_path('storage/' . $catalog->picture))): ?>
            <img src="<?php echo e(asset('storage/' . $catalog->picture)); ?>" 
                 alt="<?php echo e($catalog->name); ?>" 
                 class="w-full h-full object-contain transition-transform duration-500 group-hover:scale-105"
                 loading="lazy">
        <?php else: ?>
            <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-gray-100 to-gray-200">
                <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                </svg>
            </div>
        <?php endif; ?>
        
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
        <div class="absolute bottom-4 left-4 right-4">
            <h3 class="text-xl font-bold text-white mb-1 drop-shadow-lg"><?php echo e($catalog->name); ?></h3>
            <?php if($catalog->description): ?>
                <p class="text-sm text-white drop-shadow-md line-clamp-2"><?php echo e(Str::limit($catalog->description, 80)); ?></p>
            <?php endif; ?>
        </div>
    </div>
    
    <!-- Контент -->
    <div class="p-6">
        <?php if (isset($component)) { $__componentOriginal26b7e70cc00f3e5b204bb1b702cea781 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal26b7e70cc00f3e5b204bb1b702cea781 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.catalog-content','data' => ['catalog' => $catalog]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('catalog-content'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['catalog' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($catalog)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal26b7e70cc00f3e5b204bb1b702cea781)): ?>
<?php $attributes = $__attributesOriginal26b7e70cc00f3e5b204bb1b702cea781; ?>
<?php unset($__attributesOriginal26b7e70cc00f3e5b204bb1b702cea781); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal26b7e70cc00f3e5b204bb1b702cea781)): ?>
<?php $component = $__componentOriginal26b7e70cc00f3e5b204bb1b702cea781; ?>
<?php unset($__componentOriginal26b7e70cc00f3e5b204bb1b702cea781); ?>
<?php endif; ?>
        
        <!-- Кнопка перехода -->
        <div class="mt-6">
            <a href="<?php echo e(route('catalog.show', $catalog->id)); ?>" 
               class="block w-full bg-cyan-700 hover:bg-cyan-600 text-white text-center py-3 px-4 rounded-lg font-medium transition-colors duration-200">
                Перейти в категорию
            </a>
        </div>
    </div>
</article>
<?php /**PATH C:\laragon\www\laravel\resources\views/components/catalog-card.blade.php ENDPATH**/ ?>