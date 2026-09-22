<?php $__env->startSection('title', 'Products'); ?>

<?php $__env->startSection('page-title', 'Products'); ?>

<?php $__env->startSection('content'); ?>

<div>

    <div class="flex justify-between items-center mb-6">

        <div>
            <h1 class="text-2xl font-bold text-gray-800">
                Products
            </h1>

            <p class="text-gray-500 mt-1">
                Manage your company products.
            </p>
        </div>

        <a
            href="<?php echo e(route('admin.products.create')); ?>"
            class="bg-gray-900 text-white px-5 py-3 rounded-lg"
        >
            + Add Product
        </a>

    </div>


    <?php if(session('success')): ?>

        <div class="bg-green-100 text-green-700 px-4 py-3 rounded-lg mb-6">
            <?php echo e(session('success')); ?>

        </div>

    <?php endif; ?>


    <div class="bg-white rounded-lg shadow overflow-hidden">

        <table class="w-full">

            <thead class="bg-gray-50 border-b">

                <tr>

                    <th class="text-left px-6 py-4">
                        #
                    </th>

                    <th class="text-left px-6 py-4">
                        Code
                    </th>

                    <th class="text-left px-6 py-4">
                        Product
                    </th>

                    <th class="text-left px-6 py-4">
                        Image
                    </th>

                    <th class="text-left px-6 py-4">
                        Category
                    </th>

                    <th class="text-left px-6 py-4">
                        Price
                    </th>

                    <th class="text-left px-6 py-4">
                        Status
                    </th>

                    <th class="text-right px-6 py-4">
                        Actions
                    </th>

                </tr>

            </thead>


            <tbody>

                <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <tr class="border-b">

                        <td class="px-6 py-4">
                            <?php echo e($product->id); ?>

                        </td>

                        <td class="px-6 py-4">
                            <?php echo e($product->product_code); ?>

                        </td>

                        <td class="px-6 py-4 font-medium">
                            <?php echo e($product->name); ?>

                        </td>

                        <td class="px-6 py-4">
                            <?php if($product->image): ?>
                                <img
                                    src="<?php echo e(Storage::url($product->image)); ?>"
                                    alt="<?php echo e($product->name); ?>"
                                    class="w-12 h-12 object-cover rounded-lg border"
                                >
                            <?php else: ?>
                                <span class="text-gray-400 text-sm">No image</span>
                            <?php endif; ?>
                        </td>

                        <td class="px-6 py-4">
                            <?php echo e($product->category?->name ?? '—'); ?>

                        </td>

                        <td class="px-6 py-4">
                            <?php echo e($product->price !== null ? '₹' . number_format($product->price, 2) : '—'); ?>

                        </td>

                        <td class="px-6 py-4">

                            <?php if($product->status): ?>

                                <span class="px-3 py-1 text-sm bg-green-100 text-green-700 rounded-full">
                                    Active
                                </span>

                            <?php else: ?>

                                <span class="px-3 py-1 text-sm bg-gray-100 text-gray-600 rounded-full">
                                    Draft
                                </span>

                            <?php endif; ?>

                        </td>

                        <td class="px-6 py-4">

                            <div class="flex justify-end gap-3">

                                

                                <a
                                    href="<?php echo e(route('admin.products.show', $product)); ?>"
                                    class="text-blue-600"
                                >
                                    View
                                </a>

                                <a
                                    href="<?php echo e(route('admin.products.edit', $product)); ?>"
                                    class="text-indigo-600"
                                >
                                    Edit
                                </a>

                                <form
                                    action="<?php echo e(route('admin.products.destroy', $product)); ?>"
                                    method="POST"
                                    onsubmit="return confirm('Delete this product?')"
                                >

                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>

                                    <button
                                        type="submit"
                                        class="text-red-600"
                                    >
                                        Delete
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                    <tr>

                        <td
                            colspan="8"
                            class="px-6 py-10 text-center text-gray-500"
                        >
                            No products found.
                        </td>

                    </tr>

                <?php endif; ?>

            </tbody>

        </table>

    </div>


    <div class="mt-6">
        <?php echo e($products->links()); ?>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\company-cms-laravel-ne\company-cms\resources\views/admin/products/index.blade.php ENDPATH**/ ?>