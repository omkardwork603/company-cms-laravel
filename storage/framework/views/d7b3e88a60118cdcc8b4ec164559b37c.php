<?php $__env->startSection('title', 'Services'); ?>

<?php $__env->startSection('content'); ?>

<section class="py-20">

    <div class="max-w-7xl mx-auto px-6">

        <h1 class="text-4xl font-bold mb-12">
            Our Services
        </h1>


        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            <?php $__empty_1 = true; $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                <article class="border rounded-xl p-6">

                    <?php if($service->image): ?>

                        <img
                            src="<?php echo e(Storage::url($service->image)); ?>"
                            alt="<?php echo e($service->title); ?>"
                            class="w-full h-48 object-cover rounded-lg mb-5"
                        >

                    <?php endif; ?>


                    <h2 class="text-xl font-bold mb-3">

                        <?php echo e($service->title); ?>


                    </h2>


                    <p class="text-gray-600 mb-5">

                        <?php echo e(Str::limit($service->description, 120)); ?>


                    </p>


                    <a
                        href="<?php echo e(route('services.show', $service->slug)); ?>"
                        class="font-semibold"
                    >
                        Read More →
                    </a>

                </article>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                <p>No services available.</p>

            <?php endif; ?>

        </div>

    </div>

</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\company-cms-laravel-ne\company-cms\resources\views/frontend/services/index.blade.php ENDPATH**/ ?>