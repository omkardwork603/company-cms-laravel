<?php $__env->startSection('title', $page?->title ?? 'About Us'); ?>

<?php $__env->startSection('content'); ?>

<section class="py-20">

    <div class="max-w-5xl mx-auto px-6">

        <h1 class="text-4xl font-bold mb-8">
            <?php echo e($page?->title ?? 'About Us'); ?>

        </h1>


        <?php if($page?->featured_image): ?>

            <img
                src="<?php echo e(asset('storage/' . $page->featured_image)); ?>"
                alt="<?php echo e($page->title); ?>"
                class="w-full rounded-xl mb-10"
            >

        <?php endif; ?>


        <div class="prose max-w-none">

            <?php if(!empty($page?->content)): ?>
                <?php echo $page->content; ?>

            <?php elseif(!empty($settings?->details)): ?>
                <p class="text-lg text-gray-700 leading-relaxed">
                    <?php echo e($settings->details); ?>

                </p>
            <?php else: ?>
                <p class="text-lg text-gray-600 leading-relaxed">
                    Welcome to <?php echo e($settings?->site_name ?? $settings?->company_name ?? 'Our Company'); ?>.
                    <?php echo e($settings?->site_tagline ?? 'Building Better Solutions for Your Business'); ?>. We provide innovative solutions designed to help businesses grow, improve performance and achieve long-term success.
                </p>
            <?php endif; ?>

        </div>

    </div>

</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\company-cms-laravel-ne\company-cms\resources\views/frontend/layout/about.blade.php ENDPATH**/ ?>