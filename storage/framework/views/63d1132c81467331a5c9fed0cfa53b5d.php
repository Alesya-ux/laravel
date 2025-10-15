<?php $__env->startSection('content'); ?>



<body>
<section class="rounded-lg bg-neutral-50 shadow-lg p-4 max-w-[95%] mx-auto mt-10">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <?php echo e(__("Вы вошли в систему!")); ?>

                </div>
            </div>
        </div>
    </div>
</section>


</body>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.tall', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\laravel\resources\views/dashboard.blade.php ENDPATH**/ ?>