

<?php $__env->startSection('title', 'Pages'); ?>

<?php $__env->startSection('page-title', 'Pages'); ?>

<?php $__env->startSection('content'); ?>

<div>

    
    <div class="flex justify-between items-center mb-6">

        <div>

            <h1 class="text-2xl font-bold text-gray-800">
                Pages
            </h1>

            <p class="text-gray-500 mt-1">
                Manage your website pages.
            </p>

        </div>

        <a
            href="<?php echo e(route('admin.pages.create')); ?>"
            class="bg-gray-900 text-white px-5 py-3 rounded-lg hover:bg-gray-800"
        >
            + Add Page
        </a>

    </div>


    
    <?php if(session('success')): ?>

        <div class="bg-green-100 text-green-700 px-4 py-3 rounded-lg mb-6">

            <?php echo e(session('success')); ?>


        </div>

    <?php endif; ?>


    
    <?php if($errors->any()): ?>

        <div class="bg-red-100 text-red-700 px-4 py-3 rounded-lg mb-6">

            <ul class="list-disc ml-5">

                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <li><?php echo e($error); ?></li>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </ul>

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
                        Title
                    </th>

                    <th class="text-left px-6 py-4">
                        Slug
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

                <?php $__empty_1 = true; $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <tr class="border-b">

                        <td class="px-6 py-4">
                            <?php echo e($page->id); ?>

                        </td>

                        <td class="px-6 py-4 font-medium">
                            <?php echo e($page->title); ?>

                        </td>

                        <td class="px-6 py-4 text-gray-500">
                            /<?php echo e($page->slug); ?>

                        </td>

                        <td class="px-6 py-4">

                            <?php if($page->status): ?>

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
                                    href="<?php echo e(route('admin.pages.show', $page)); ?>"
                                    class="text-blue-600 hover:underline"
                                >
                                    View
                                </a>

                                <a
                                    href="<?php echo e(route('admin.pages.edit', $page)); ?>"
                                    class="text-indigo-600 hover:underline"
                                >
                                    Edit
                                </a>

                                <form
                                    action="<?php echo e(route('admin.pages.destroy', $page)); ?>"
                                    method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this page?')"
                                >

                                    <?php echo csrf_field(); ?>

                                    <?php echo method_field('DELETE'); ?>

                                    <button
                                        type="submit"
                                        class="text-red-600 hover:underline"
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
                            colspan="5"
                            class="px-6 py-10 text-center text-gray-500"
                        >
                            No pages found.

                        </td>

                    </tr>

                <?php endif; ?>

            </tbody>

        </table>

    </div>


    
    <div class="mt-6">

        <?php echo e($pages->links()); ?>


    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\company-cms-laravel\company-cms\new\update new\company-cms-updated\resources\views/admin/pages/index.blade.php ENDPATH**/ ?>