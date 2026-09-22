<?php $__env->startSection('title', 'Projects'); ?>

<?php $__env->startSection('page-title', 'Projects'); ?>

<?php $__env->startSection('content'); ?>

<div>

    
    <div class="flex justify-between items-center mb-6">

        <div>

            <h1 class="text-2xl font-bold text-gray-800">
                Projects
            </h1>

            <p class="text-gray-500 mt-1">
                Manage your company projects.
            </p>

        </div>

        <a
            href="<?php echo e(route('admin.projects.create')); ?>"
            class="bg-gray-900 text-white px-5 py-3 rounded-lg"
        >
            + Add Project
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
                        Project
                    </th>

                    <th class="text-left px-6 py-4">
                        Image
                    </th>

                    <th class="text-left px-6 py-4">
                        Client
                    </th>

                    <th class="text-left px-6 py-4">
                        Category
                    </th>

                    <th class="text-left px-6 py-4">
                        Order
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

                <?php $__empty_1 = true; $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <tr class="border-b">

                        <td class="px-6 py-4">
                            <?php echo e($project->id); ?>

                        </td>

                        <td class="px-6 py-4 font-medium">
                            <?php echo e($project->title); ?>

                        </td>

                        <td class="px-6 py-4">
                            <?php if($project->featured_image): ?>
                                <img
                                    src="<?php echo e(Storage::url($project->featured_image)); ?>"
                                    alt="<?php echo e($project->title); ?>"
                                    class="w-12 h-12 object-cover rounded-lg border"
                                >
                            <?php else: ?>
                                <span class="text-gray-400 text-sm">No image</span>
                            <?php endif; ?>
                        </td>

                        <td class="px-6 py-4">
                            <?php echo e($project->client_name ?? '—'); ?>

                        </td>

                        <td class="px-6 py-4">
                            <?php echo e($project->category ?? '—'); ?>

                        </td>

                        <td class="px-6 py-4">
                            <?php echo e($project->display_order); ?>

                        </td>

                        <td class="px-6 py-4">

                            <?php if($project->status): ?>

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
                                    href="<?php echo e(route('admin.projects.show', $project)); ?>"
                                    class="text-blue-600"
                                >
                                    View
                                </a>

                                <a
                                    href="<?php echo e(route('admin.projects.edit', $project)); ?>"
                                    class="text-indigo-600"
                                >
                                    Edit
                                </a>

                                <form
                                    action="<?php echo e(route('admin.projects.destroy', $project)); ?>"
                                    method="POST"
                                    onsubmit="return confirm('Delete this project?')"
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
                            No projects found.
                        </td>

                    </tr>

                <?php endif; ?>

            </tbody>

        </table>

    </div>


    
    <div class="mt-6">

        <?php echo e($projects->links()); ?>


    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\company-cms-laravel\company-cms\new\update new\company-cms-updated\resources\views/admin/projects/index.blade.php ENDPATH**/ ?>