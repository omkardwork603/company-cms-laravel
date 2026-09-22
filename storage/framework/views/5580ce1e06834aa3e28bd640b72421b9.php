<?php $__env->startSection('title', $service->title); ?>

<?php $__env->startSection('content'); ?>

<section class="py-20">

    <div class="max-w-5xl mx-auto px-6">

        <h1 class="text-4xl font-bold">
            <?php echo e($service->title); ?>

        </h1>

        <?php if($service->image): ?>

            <div class="mt-8">
                <img
                    src="<?php echo e(Storage::url($service->image)); ?>"
                    alt="<?php echo e($service->title); ?>"
                    class="w-full max-w-2xl rounded-xl object-cover"
                >
            </div>

        <?php endif; ?>

        <?php if($service->short_description): ?>

            <p class="text-xl text-gray-500 mt-4">
                <?php echo e($service->short_description); ?>

            </p>

        <?php endif; ?>


        <div class="mt-10 text-gray-700 leading-8 whitespace-pre-line">

            <?php echo e($service->description); ?>


        </div>


        <div class="mt-10">

            <a
                href="<?php echo e(route('services.index')); ?>"
                class="text-blue-600"
            >
                ← Back to Services
            </a>

        </div>

    </div>

</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\company-cms-laravel\company-cms\new\update new\company-cms-updated\resources\views/frontend/services/show.blade.php ENDPATH**/ ?>