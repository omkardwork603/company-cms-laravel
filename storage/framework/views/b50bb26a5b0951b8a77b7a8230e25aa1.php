<?php $__env->startSection('title', 'Team'); ?>

<?php $__env->startSection('page-title', 'Team'); ?>

<?php $__env->startSection('content'); ?>

<div>

    
    <div class="flex justify-between items-center mb-6">

        <div>

            <h1 class="text-2xl font-bold text-gray-800">
                Team
            </h1>

            <p class="text-gray-500 mt-1">
                Manage your company team members.
            </p>

        </div>

        <a
            href="<?php echo e(route('admin.team.create')); ?>"
            class="bg-gray-900 text-white px-5 py-3 rounded-lg"
        >
            + Add Team Member
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
                        Name
                    </th>

                    <th class="text-left px-6 py-4">
                        Designation
                    </th>

                    <th class="text-left px-6 py-4">
                        Department
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

                <?php $__empty_1 = true; $__currentLoopData = $teamMembers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <tr class="border-b">

                        <td class="px-6 py-4">
                            <?php echo e($member->id); ?>

                        </td>

                        <td class="px-6 py-4 font-medium">
                            <?php echo e($member->name); ?>

                        </td>

                        <td class="px-6 py-4">
                            <?php echo e($member->designation ?? '—'); ?>

                        </td>

                        <td class="px-6 py-4">
                            <?php echo e($member->department ?? '—'); ?>

                        </td>

                        <td class="px-6 py-4">
                            <?php echo e($member->display_order); ?>

                        </td>

                        <td class="px-6 py-4">

                            <?php if($member->status): ?>

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
                                    href="<?php echo e(route('admin.team.show', $member)); ?>"
                                    class="text-blue-600"
                                >
                                    View
                                </a>

                                <a
                                    href="<?php echo e(route('admin.team.edit', $member)); ?>"
                                    class="text-indigo-600"
                                >
                                    Edit
                                </a>

                                <form
                                    action="<?php echo e(route('admin.team.destroy', $member)); ?>"
                                    method="POST"
                                    onsubmit="return confirm('Delete this team member?')"
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
                            colspan="7"
                            class="px-6 py-10 text-center text-gray-500"
                        >
                            No team members found.
                        </td>

                    </tr>

                <?php endif; ?>

            </tbody>

        </table>

    </div>


    
    <div class="mt-6">

        <?php echo e($teamMembers->links()); ?>


    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\company-cms-laravel\company-cms\new\update new\company-cms-updated\resources\views/admin/team/index.blade.php ENDPATH**/ ?>