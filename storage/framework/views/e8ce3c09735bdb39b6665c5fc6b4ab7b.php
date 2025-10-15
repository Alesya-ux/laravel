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

<?php if($catalog->childs && $catalog->childs->count() > 0): ?>
    <div class="mb-4">
        <h4 class="text-sm font-semibold text-gray-800 mb-3 flex items-center">
            <svg class="w-4 h-4 mr-2 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
            </svg>
            Подкатегории
        </h4>
        <div class="space-y-2">
            <?php $__currentLoopData = $catalog->childs->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="flex items-center space-x-2 p-2 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                    <div class="w-2 h-2 bg-cyan-500 rounded-full flex-shrink-0"></div>
                    <a href="<?php echo e(route('catalog.show', $child->id)); ?>" 
                       class="text-sm text-gray-700 hover:text-cyan-600 transition-colors duration-200 flex-1 truncate">
                        <?php echo e($child->name); ?>

                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php if($catalog->childs->count() > 3): ?>
                <div class="text-xs text-gray-400 text-center pt-2">
                    И ещё <?php echo e($catalog->childs->count() - 3); ?> подкатегорий
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php elseif($catalog->products && $catalog->products->count() > 0): ?>
    <div class="mb-4">
        <h4 class="text-sm font-semibold text-gray-800 mb-3 flex items-center">
            <svg class="w-4 h-4 mr-2 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
            </svg>
            Товары
        </h4>
        <div class="space-y-2">
            <?php $__currentLoopData = $catalog->products->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="flex items-center space-x-2 p-2 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                    <div class="w-2 h-2 bg-cyan-500 rounded-full flex-shrink-0"></div>
                    <a href="<?php echo e(route('product.show', $product->id)); ?>" 
                       class="text-sm text-gray-700 hover:text-cyan-600 transition-colors duration-200 flex-1 truncate">
                        <?php echo e($product->name); ?>

                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php if($catalog->products->count() > 3): ?>
                <div class="text-xs text-gray-400 text-center pt-2">
                    И ещё <?php echo e($catalog->products->count() - 3); ?> товаров
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php else: ?>
    <div class="text-center py-4">
        <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-3">
            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
            </svg>
        </div>
        <p class="text-gray-500 text-sm">Товары в разработке</p>
    </div>
<?php endif; ?>
<?php /**PATH C:\laragon\www\laravel\resources\views/components/catalog-content.blade.php ENDPATH**/ ?>