<?php $__env->startSection('title', 'View Product'); ?>

<?php $__env->startSection('page-title', 'View Product'); ?>

<?php $__env->startSection('content'); ?>

<div class="max-w-4xl">

    <div class="bg-white rounded-lg shadow p-8">

        <h1 class="text-3xl font-bold">
            <?php echo e($product->name); ?>

        </h1>

        
        <?php if($product->image): ?>
            <div class="mt-6">
                <img
                    src="<?php echo e(Storage::url($product->image)); ?>"
                    alt="<?php echo e($product->name); ?>"
                    class="w-full max-w-lg rounded-lg border object-cover"
                >
            </div>
        <?php endif; ?>


        <div class="mt-6">

            <strong>Category:</strong>

            <?php echo e($product->category?->name ?? '—'); ?>


        </div>


        <div class="mt-4">

            <strong>Price:</strong>

            <?php echo e($product->price !== null
                ? '₹' . number_format($product->price, 2)
                : '—'); ?>


        </div>


        <div class="mt-4">

            <strong>Status:</strong>

            <?php if($product->status): ?>

                <span class="text-green-600">
                    Active
                </span>

            <?php else: ?>

                <span class="text-gray-500">
                    Draft
                </span>

            <?php endif; ?>

        </div>


        <div class="mt-8">

            <h2 class="text-xl font-bold mb-3">
                Short Description
            </h2>

            <p class="text-gray-600">
                <?php echo e($product->short_description); ?>

            </p>

        </div>


        <div class="mt-8">

            <h2 class="text-xl font-bold mb-3">
                Description
            </h2>

            <div class="text-gray-600 whitespace-pre-line">
                <?php echo e($product->description); ?>

            </div>

        </div>


        <div class="mt-8 flex gap-3">

            <a
                href="<?php echo e(route('admin.products.edit', $product)); ?>"
                class="bg-gray-900 text-white px-6 py-3 rounded-lg"
            >
                Edit Product
            </a>

            <a
                href="<?php echo e(route('admin.products.index')); ?>"
                class="bg-gray-200 px-6 py-3 rounded-lg"
            >
                Back
            </a>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\company-cms-laravel\company-cms\new\update new\company-cms-updated\resources\views/admin/products/show.blade.php ENDPATH**/ ?>