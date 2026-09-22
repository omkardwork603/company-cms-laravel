<?php $__env->startSection('title', 'Add Product'); ?>

<?php $__env->startSection('page-title', 'Add Product'); ?>

<?php $__env->startSection('content'); ?>

<div class="max-w-4xl">

    <div class="bg-white rounded-lg shadow p-8">

        <form
            action="<?php echo e(route('admin.products.store')); ?>"
            method="POST"
            enctype="multipart/form-data"
        >

            <?php echo csrf_field(); ?>


            
            <div class="mb-6">

                <label class="block font-medium mb-2">
                    Product Code
                </label>

                <input
                    type="text"
                    name="product_code"
                    value="<?php echo e(old('product_code')); ?>"
                    placeholder="PRD-001"
                    class="w-full border rounded-lg px-4 py-3"
                    required
                >

                <?php $__errorArgs = ['product_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-red-500 text-sm mt-1">
                        <?php echo e($message); ?>

                    </p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            </div>


            
            <div class="mb-6">

                <label class="block font-medium mb-2">
                    Product Name
                </label>

                <input
                    type="text"
                    name="name"
                    value="<?php echo e(old('name')); ?>"
                    placeholder="Product Name"
                    class="w-full border rounded-lg px-4 py-3"
                    required
                >

                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-red-500 text-sm mt-1">
                        <?php echo e($message); ?>

                    </p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            </div>


            
            <div class="mb-6">

                <label class="block font-medium mb-2">
                    Slug
                </label>

                <input
                    type="text"
                    name="slug"
                    value="<?php echo e(old('slug')); ?>"
                    placeholder="product-name"
                    class="w-full border rounded-lg px-4 py-3"
                >

                <p class="text-gray-500 text-sm mt-1">
                    Leave empty to generate automatically.
                </p>

            </div>


            
            <div class="mb-6">

                <label class="block font-medium mb-2">
                    Category
                </label>

                <select
                    name="category_id"
                    class="w-full border rounded-lg px-4 py-3"
                >

                    <option value="">
                        Select Category
                    </option>

                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <option
                            value="<?php echo e($category->id); ?>"
                            <?php echo e(old('category_id') == $category->id ? 'selected' : ''); ?>

                        >
                            <?php echo e($category->name); ?>

                        </option>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </select>

            </div>


            
            <div class="mb-6">

                <label class="block font-medium mb-2">
                    Price
                </label>

                <input
                    type="number"
                    name="price"
                    value="<?php echo e(old('price')); ?>"
                    step="0.01"
                    min="0"
                    placeholder="0.00"
                    class="w-full border rounded-lg px-4 py-3"
                >

            </div>


            
            <div class="mb-6">

                <label class="block font-medium mb-2">
                    Image
                </label>

                <input
                    type="file"
                    name="image"
                    accept="image/*"
                    class="w-full border rounded-lg px-4 py-3"
                >

                <p class="text-gray-500 text-sm mt-1">
                    Accepted formats: JPG, PNG, GIF, WEBP (max 2MB).
                </p>

                <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-red-500 text-sm mt-1">
                        <?php echo e($message); ?>

                    </p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            </div>


            
            <div class="mb-6">

                <label class="block font-medium mb-2">
                    Short Description
                </label>

                <textarea
                    name="short_description"
                    rows="4"
                    class="w-full border rounded-lg px-4 py-3"
                ><?php echo e(old('short_description')); ?></textarea>

            </div>


            
            <div class="mb-6">

                <label class="block font-medium mb-2">
                    Description
                </label>

                <textarea
                    name="description"
                    rows="10"
                    class="w-full border rounded-lg px-4 py-3"
                ><?php echo e(old('description')); ?></textarea>

            </div>


            
            <div class="mb-6">

                <label class="block font-medium mb-2">
                    Display Order
                </label>

                <input
                    type="number"
                    name="display_order"
                    value="<?php echo e(old('display_order', 0)); ?>"
                    min="0"
                    class="w-full border rounded-lg px-4 py-3"
                >

            </div>


            
            <div class="mb-6">

                <label class="block font-medium mb-2">
                    Status
                </label>

                <select
                    name="status"
                    class="w-full border rounded-lg px-4 py-3"
                >

                    <option value="1">Active</option>
                    <option value="0">Draft</option>

                </select>

            </div>


            <div class="flex gap-3">

                <button
                    type="submit"
                    class="bg-gray-900 text-white px-6 py-3 rounded-lg"
                >
                    Create Product
                </button>

                <a
                    href="<?php echo e(route('admin.products.index')); ?>"
                    class="bg-gray-200 px-6 py-3 rounded-lg"
                >
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\company-cms-laravel\company-cms\new\update new\company-cms-updated\resources\views/admin/products/create.blade.php ENDPATH**/ ?>