<?php $__env->startSection('content'); ?>

    <header>
        <meta name="description" content="Краткое описание вашей страницы.">
        <meta name="keywords" content="ключевое, слово, разделенное, запятыми">
    </header> <!-- Сделать SEO-->

    <main>
    <div class = "p-6 ">
            <h1 class="text-3xl font-semibold"> <?php echo e($catalog->name); ?> </h1>
        </div>

        <section class="rounded-lg bg-neutral-50 shadow-lg  max-w-[95%] mx-auto  fade-in section-shadow">

            <div class="ml-4 w-full lg:w-1/2  ">
                <h2 class="text-3xl font-semibold text-fade-in">
                    <?php if($catalog->parent): ?>
                        <a href="/catalog/<?php echo e($catalog->parent->id); ?>"
                           class="block py-2 px-4 rounded-md hover:bg-gray-200 active-link"
                           data-section="section1"><?php echo e($catalog->parent->name); ?> </a>
                    <?php endif; ?>
                    <?php echo e($catalog->name); ?></h2>
            </div>
            <div class="container mx-auto py-8 flex flex-col md:flex-row  ">
                <aside class="w-full md:w-1/4 bg-neutral-50 rounded-md p-4 mb-4 md:mb-0 md:mr-4 shadow-md">
                    фильтр
                </aside><!-- Фильтр -->
                <div class="container mx-auto ">
                    
                    <article class="w-full">
                        <?php if($catalog->products && count($catalog->products) > 0): ?>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                <?php $__currentLoopData = $catalog->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="bg-white rounded-lg shadow-md overflow-hidden card-hover hover-lift">
                                        <a href="/product/<?php echo e($product->id); ?>">
                                            <img src="<?php echo e($product->main_image_url ?? asset('pictures/fon.png')); ?>"
                                                 alt="<?php echo e($product->name); ?>"
                                                 class="w-full object-contain object-center img-hover">
                                        </a>
                                        <div class="p-4">
                                            <h3 class="text-base font-medium">
                                                <a href="/product/<?php echo e($product->id); ?>"
                                                   class="hover:text-cyan-700 transition duration-200"><?php echo e($product->name); ?></a>
                                            </h3>
                                            <?php if($product->price): ?>
                                                <div class="mt-2">
                                                    <span class="text-lg font-bold text-cyan-700"><?php echo e($product->getFormattedFirstPrice()); ?></span>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php else: ?>
                            <div class="bg-white rounded-md p-6 shadow-md">
                                <p class="text-gray-500">В этой категории нет товаров.</p>
                            </div>
                        <?php endif; ?>
                    </article>
                </div>
            </div>
        </section>

        <section class="rounded-lg bg-neutral-50 shadow-lg p-6 max-w-[70%] mx-auto mt-10 fade-in">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Часто задаваемые вопросы</h2>
                <p class="text-xl text-gray-700 max-w-3xl mx-auto">Здесь вы найдете всю необходимую информацию о продукте</p>
            </div>
        </section>

        <aside class="rounded-lg bg-neutral-50 shadow-lg p-4 max-w-[95%] mx-auto mt-10 fade-in section-shadow">
            <?php if($faqs && $faqs->count() > 0): ?>
                <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="collapse bg-base-100 border-base-300 border mt-2">
                        <input type="checkbox"/>
                        <div class="collapse-title font-semibold text-gray-700 hover:text-cyan-700 transition-colors">
                            <?php echo e($faq->question); ?>

                        </div>
                        <div class="collapse-content text-sm text-gray-600">
                            <p><?php echo e($faq->answer); ?></p>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <div class="text-center py-8">
                    <p class="text-gray-500">Часто задаваемые вопросы пока не добавлены.</p>
                </div>
            <?php endif; ?>
        </aside>

    </main>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.tall', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\laravel\resources\views/catalog_one.blade.php ENDPATH**/ ?>