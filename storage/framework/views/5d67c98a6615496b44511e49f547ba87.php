<?php $__env->startSection('content'); ?>
        <div class = "p-6 ">
            <h2 class="text-3xl font-semibold"><?php echo e($maintext->name); ?></h2>
            <?php echo $maintext->body; ?>

        </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.tall', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\laravel\resources\views/article.blade.php ENDPATH**/ ?>