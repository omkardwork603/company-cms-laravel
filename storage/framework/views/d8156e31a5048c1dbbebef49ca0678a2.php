

<?php $__env->startSection('title', 'View Page'); ?>

<?php $__env->startSection('page-title', 'View Page'); ?>

<?php $__env->startSection('content'); ?>

<div class="max-w-4xl">

    <div class="bg-white rounded-lg shadow p-8">

        <div class="mb-6">

            <h1 class="text-3xl font-bold text-gray-800">
                <?php echo e($page->title); ?>

            </h1>

            

        </div>


        <div class="mb-6">

            <span class="font-semibold">
                Status:
            </span>

            <?php if($page->status): ?>

                <span class="text-green-600">
                    Active
                </span>

            <?php else: ?>

                <span class="text-gray-500">
                    Draft
                </span>

            <?php endif; ?>

        </div>


        <div class="border-t pt-6">

            <h2 class="font-semibold text-lg mb-3">
                Content
            </h2>

            <div class="prose max-w-none whitespace-pre-line">

                <?php echo e($page->content); ?>


            </div>

        </div>


        <div class="mt-8">

            <a
                href="<?php echo e(route('admin.pages.edit', $page)); ?>"
                class="bg-gray-900 text-white px-6 py-3 rounded-lg"
            >
                Edit Page
            </a>

            <a
                href="<?php echo e(route('admin.pages.index')); ?>"
                class="ml-3 bg-gray-200 px-6 py-3 rounded-lg"
            >
                Back
            </a>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\company-cms-laravel\company-cms\new\update new\company-cms-updated\resources\views/admin/pages/show.blade.php ENDPATH**/ ?>