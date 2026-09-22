<?php $__env->startSection('title', $product->name); ?>

<?php $__env->startSection('content'); ?>

<section class="py-20">

    <div class="max-w-6xl mx-auto px-6">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

            
            <div>

                <?php if($product->image): ?>

                    <img
                        src="<?php echo e(Storage::url($product->image)); ?>"
                        alt="<?php echo e($product->name); ?>"
                        class="w-full rounded-xl"
                    >

                <?php else: ?>

                    <div class="bg-gray-100 h-96 flex items-center justify-center rounded-xl">
                        No Image
                    </div>

                <?php endif; ?>

            </div>


            
            <div>

                <p class="text-gray-500">
                    <?php echo e($product->product_code); ?>

                </p>


                <h1 class="text-4xl font-bold mt-2">
                    <?php echo e($product->name); ?>

                </h1>


                <?php if($product->category): ?>

                    <p class="text-gray-500 mt-4">
                        Category:
                        <?php echo e($product->category->name); ?>

                    </p>

                <?php endif; ?>


                <?php if($product->price !== null): ?>

                    <p class="text-2xl font-bold mt-6">
                        ₹<?php echo e(number_format($product->price, 2)); ?>

                    </p>

                <?php endif; ?>


                <?php if($product->short_description): ?>

                    <p class="text-lg text-gray-600 mt-6">
                        <?php echo e($product->short_description); ?>

                    </p>

                <?php endif; ?>


                <div class="mt-8 text-gray-700 leading-8 whitespace-pre-line">

                    <?php echo e($product->description); ?>


                </div>


                <div class="mt-8">

                    <a
                        href="<?php echo e(route('products.index')); ?>"
                        class="text-blue-600"
                    >
                        ← Back to Products
                    </a>

                </div>

            </div>

        </div>

    </div>

</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\company-cms-laravel\company-cms\new\update new\company-cms-updated\resources\views/frontend/products/show.blade.php ENDPATH**/ ?>