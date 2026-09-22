<?php $__env->startSection('title', 'Products'); ?>

<?php $__env->startSection('content'); ?>

<section class="py-20">

    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-12">

            <h1 class="text-4xl font-bold">
                Our Products
            </h1>

            <p class="text-gray-500 mt-4">
                Explore our products.
            </p>

        </div>


        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                <div class="border rounded-xl overflow-hidden">

                    <?php if($product->image): ?>

                        <img
                            src="<?php echo e(Storage::url($product->image)); ?>"
                            alt="<?php echo e($product->name); ?>"
                            class="w-full h-56 object-cover"
                        >

                    <?php endif; ?>


                    <div class="p-6">

                        <p class="text-sm text-gray-500">
                            <?php echo e($product->product_code); ?>

                        </p>


                        <h2 class="text-xl font-bold mt-2">
                            <?php echo e($product->name); ?>

                        </h2>


                        <?php if($product->category): ?>

                            <p class="text-sm text-gray-500 mt-2">
                                <?php echo e($product->category->name); ?>

                            </p>

                        <?php endif; ?>


                        <?php if($product->price !== null): ?>

                            <p class="font-semibold mt-4">
                                ₹<?php echo e(number_format($product->price, 2)); ?>

                            </p>

                        <?php endif; ?>


                        <p class="text-gray-600 mt-3">
                            <?php echo e($product->short_description); ?>

                        </p>


                        <a
                            href="<?php echo e(route('products.show', $product)); ?>"
                            class="inline-block mt-5 text-blue-600"
                        >
                            View Product →
                        </a>

                    </div>

                </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                <div class="col-span-full text-center text-gray-500">
                    No products available.
                </div>

            <?php endif; ?>

        </div>

    </div>

</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\company-cms-laravel-ne\company-cms\resources\views/frontend/products/index.blade.php ENDPATH**/ ?>