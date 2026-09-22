

<?php $__env->startSection('title', 'Edit Menu Item'); ?>

<?php $__env->startSection('page-title', 'Edit Menu Item'); ?>

<?php $__env->startSection('content'); ?>

<div class="max-w-2xl">

    <div class="bg-white rounded-xl shadow p-8">

        <form
            action="<?php echo e(route('admin.menus.items.update', [$menu, $menuItem])); ?>"
            method="POST"
        >

            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>


            <div class="mb-6">

                <label class="block font-medium mb-2">
                    Title *
                </label>

                <input
                    type="text"
                    name="title"
                    value="<?php echo e(old('title', $menuItem->title)); ?>"
                    class="w-full border rounded-lg px-4 py-3"
                    required
                >

            </div>


            <div class="mb-6">

                <label class="block font-medium mb-2">
                    URL
                </label>

                <input
                    type="text"
                    name="url"
                    value="<?php echo e(old('url', $menuItem->url)); ?>"
                    class="w-full border rounded-lg px-4 py-3"
                >

            </div>


            <div class="mb-6">

                <label class="block font-medium mb-2">
                    Parent Menu
                </label>

                <select
                    name="parent_id"
                    class="w-full border rounded-lg px-4 py-3"
                >

                    <option value="">
                        None — Main Menu Item
                    </option>

                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <option
                            value="<?php echo e($item->id); ?>"
                            <?php echo e(old('parent_id', $menuItem->parent_id) == $item->id ? 'selected' : ''); ?>

                        >
                            <?php echo e($item->title); ?>

                        </option>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </select>

            </div>


            <div class="mb-6">

                <label class="block font-medium mb-2">
                    Open Link
                </label>

                <select
                    name="target"
                    class="w-full border rounded-lg px-4 py-3"
                >

                    <option
                        value="_self"
                        <?php echo e($menuItem->target === '_self' ? 'selected' : ''); ?>

                    >
                        Same Window
                    </option>

                    <option
                        value="_blank"
                        <?php echo e($menuItem->target === '_blank' ? 'selected' : ''); ?>

                    >
                        New Window
                    </option>

                </select>

            </div>


            <div class="mb-6">

                <label class="block font-medium mb-2">
                    Sort Order
                </label>

                <input
                    type="number"
                    name="sort_order"
                    value="<?php echo e(old('sort_order', $menuItem->sort_order)); ?>"
                    min="0"
                    class="w-full border rounded-lg px-4 py-3"
                >

            </div>


            <div class="mb-6">

                <label class="inline-flex items-center">

                    <input
                        type="checkbox"
                        name="status"
                        value="1"
                        <?php echo e($menuItem->status ? 'checked' : ''); ?>

                        class="mr-2"
                    >

                    Active

                </label>

            </div>


            <div class="flex gap-3">

                <button
                    type="submit"
                    class="bg-gray-900 text-white px-6 py-3 rounded-lg"
                >
                    Update Item
                </button>


                <a
                    href="<?php echo e(route('admin.menus.edit', $menu)); ?>"
                    class="bg-gray-200 px-6 py-3 rounded-lg"
                >
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\company-cms-laravel\company-cms\new\update new\company-cms-updated\resources\views/admin/menus/items/edit.blade.php ENDPATH**/ ?>