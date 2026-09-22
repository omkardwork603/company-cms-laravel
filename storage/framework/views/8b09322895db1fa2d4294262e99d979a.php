<?php $__env->startSection('title', 'Menus'); ?>

<?php $__env->startSection('page-title', 'Menus'); ?>

<?php $__env->startSection('content'); ?>

<div>

    <div class="flex justify-between items-center mb-8">

        <div>

            <h1 class="text-2xl font-bold">
                Menus
            </h1>

            <p class="text-gray-500 mt-1">
                Manage website navigation menus.
            </p>

        </div>


        <a
            href="<?php echo e(route('admin.menus.create')); ?>"
            class="bg-gray-900 text-white px-5 py-3 rounded-lg"
        >
            + Create Menu
        </a>

    </div>


    <?php if(session('success')): ?>

        <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-6">
            <?php echo e(session('success')); ?>

        </div>

    <?php endif; ?>


    <div class="bg-white rounded-xl shadow border overflow-hidden">

        <table class="w-full">

            <thead class="bg-gray-50">

                <tr>

                    <th class="text-left p-4">
                        Name
                    </th>

                    <th class="text-left p-4">
                        Location
                    </th>

                    <th class="text-left p-4">
                        Items
                    </th>

                    <th class="text-left p-4">
                        Status
                    </th>

                    <th class="text-right p-4">
                        Actions
                    </th>

                </tr>

            </thead>


            <tbody>

                <?php $__empty_1 = true; $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <tr class="border-t">

                        <td class="p-4 font-medium">
                            <?php echo e($menu->name); ?>

                        </td>

                        <td class="p-4">
                            <?php echo e($menu->location); ?>

                        </td>

                        <td class="p-4">
                            <?php echo e($menu->items_count); ?>

                        </td>

                        <td class="p-4">

                            <?php if($menu->status): ?>

                                <span class="text-green-600">
                                    Active
                                </span>

                            <?php else: ?>

                                <span class="text-red-600">
                                    Inactive
                                </span>

                            <?php endif; ?>

                        </td>

                        <td class="p-4">

                            <div class="flex justify-end gap-4">

                                <a
                                    href="<?php echo e(route('admin.menus.edit', $menu)); ?>"
                                    class="text-blue-600"
                                >
                                    Manage
                                </a>


                                <form
                                    action="<?php echo e(route('admin.menus.destroy', $menu)); ?>"
                                    method="POST"
                                    onsubmit="return confirm('Delete this menu?')"
                                >

                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>

                                    <button class="text-red-600">
                                        Delete
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                    <tr>

                        <td
                            colspan="5"
                            class="p-8 text-center text-gray-500"
                        >
                            No menus found.
                        </td>

                    </tr>

                <?php endif; ?>

            </tbody>

        </table>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\company-cms-laravel\company-cms\new\update new\company-cms-updated\resources\views/admin/menus/index.blade.php ENDPATH**/ ?>