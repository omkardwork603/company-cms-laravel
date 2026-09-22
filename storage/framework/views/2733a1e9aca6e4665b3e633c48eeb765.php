<?php $__env->startSection('title', 'Manage Menu'); ?>

<?php $__env->startSection('page-title', 'Manage Menu'); ?>

<?php $__env->startSection('content'); ?>

<div>

    <?php if(session('success')): ?>

        <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-6">
            <?php echo e(session('success')); ?>

        </div>

    <?php endif; ?>


    <div class="flex justify-between items-center mb-8">

        <div>

            <h1 class="text-2xl font-bold">
                <?php echo e($menu->name); ?>

            </h1>

            <p class="text-gray-500">
                Location: <?php echo e($menu->location); ?>

            </p>

        </div>


        <a
            href="<?php echo e(route('admin.menus.items.create', $menu)); ?>"
            class="bg-gray-900 text-white px-5 py-3 rounded-lg"
        >
            + Add Menu Item
        </a>

    </div>


    <div class="bg-white rounded-xl shadow border">

        <div class="p-6 border-b">

            <h2 class="text-lg font-semibold">
                Menu Items
            </h2>

        </div>


        <div class="divide-y">

            <?php $__empty_1 = true; $__currentLoopData = $menu->items->whereNull('parent_id')->sortBy('sort_order'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                

                <div class="p-5">

                    <div class="flex justify-between items-center">

                        <div>

                            <div class="font-semibold">
                                <?php echo e($item->title); ?>

                            </div>

                            <div class="text-sm text-gray-500">
                                <?php echo e($item->url); ?>

                            </div>

                        </div>


                        <div class="flex gap-4">

                            <a
                                href="<?php echo e(route('admin.menus.items.edit', [$menu, $item])); ?>"
                                class="text-blue-600"
                            >
                                Edit
                            </a>


                            <form
                                action="<?php echo e(route('admin.menus.items.destroy', [$menu, $item])); ?>"
                                method="POST"
                                onsubmit="return confirm('Delete this item?')"
                            >

                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>

                                <button class="text-red-600">
                                    Delete
                                </button>

                            </form>

                        </div>

                    </div>


                    

                    <?php if($item->children->count()): ?>

                        <div class="ml-8 mt-4 space-y-3">

                            <?php $__currentLoopData = $item->children->where('status', true)->sortBy('sort_order'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <div class="flex justify-between items-center bg-gray-50 rounded-lg p-4">

                                    <div>

                                        <div class="font-medium">
                                            ↳ <?php echo e($child->title); ?>

                                        </div>

                                        <div class="text-sm text-gray-500">
                                            <?php echo e($child->url); ?>

                                        </div>

                                    </div>


                                    <div class="flex gap-4">

                                        <a
                                            href="<?php echo e(route('admin.menus.items.edit', [$menu, $child])); ?>"
                                            class="text-blue-600"
                                        >
                                            Edit
                                        </a>


                                        <form
                                            action="<?php echo e(route('admin.menus.items.destroy', [$menu, $child])); ?>"
                                            method="POST"
                                            onsubmit="return confirm('Delete this item?')"
                                        >

                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>

                                            <button class="text-red-600">
                                                Delete
                                            </button>

                                        </form>

                                    </div>

                                </div>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>

                    <?php endif; ?>

                </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                <div class="p-10 text-center text-gray-500">

                    No menu items yet.

                </div>

            <?php endif; ?>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\company-cms-laravel\company-cms\new\update new\company-cms-updated\resources\views/admin/menus/edit.blade.php ENDPATH**/ ?>