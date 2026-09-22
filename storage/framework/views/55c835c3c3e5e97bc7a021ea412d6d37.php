<?php $__env->startSection('title', 'Messages'); ?>

<?php $__env->startSection('page-title', 'Messages'); ?>

<?php $__env->startSection('content'); ?>

<div>

    <div class="mb-6">

        <h1 class="text-2xl font-bold">
            Contact Messages
        </h1>

        <p class="text-gray-500">
            Manage messages received from the website.
        </p>

    </div>


    <?php if(session('success')): ?>

        <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-6">

            <?php echo e(session('success')); ?>


        </div>

    <?php endif; ?>


    <div class="bg-white rounded-lg shadow overflow-hidden">

        <table class="w-full">

            <thead class="bg-gray-50">

                <tr>

                    <th class="text-left p-4">
                        Name
                    </th>

                    <th class="text-left p-4">
                        Email
                    </th>

                    <th class="text-left p-4">
                        Subject
                    </th>

                    <th class="text-left p-4">
                        Status
                    </th>

                    <th class="text-left p-4">
                        Date
                    </th>

                    <th class="text-right p-4">
                        Action
                    </th>

                </tr>

            </thead>


            <tbody>

                <?php $__empty_1 = true; $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <tr class="border-t">

                        <td class="p-4 font-medium">
                            <?php echo e($message->name); ?>

                        </td>

                        <td class="p-4">
                            <?php echo e($message->email); ?>

                        </td>

                        <td class="p-4">
                            <?php echo e($message->subject ?? '—'); ?>

                        </td>

                        <td class="p-4">

                            <?php if($message->status === 'unread'): ?>

                                <span class="text-red-600 font-medium">
                                    Unread
                                </span>

                            <?php else: ?>

                                <span class="text-green-600">
                                    Read
                                </span>

                            <?php endif; ?>

                        </td>

                        <td class="p-4 text-gray-500">

                            <?php echo e($message->created_at->format('d M Y')); ?>


                        </td>

                        <td class="p-4">

                            <div class="flex justify-end gap-4">

                                <a
                                    href="<?php echo e(route('admin.messages.show', $message)); ?>"
                                    class="text-blue-600"
                                >
                                    View
                                </a>


                                <form
                                    action="<?php echo e(route('admin.messages.destroy', $message)); ?>"
                                    method="POST"
                                    onsubmit="return confirm('Delete this message?')"
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
                            colspan="6"
                            class="p-8 text-center text-gray-500"
                        >
                            No messages found.
                        </td>

                    </tr>

                <?php endif; ?>

            </tbody>

        </table>

    </div>


    <div class="mt-6">

        <?php echo e($messages->links()); ?>


    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\company-cms-laravel\company-cms\new\update new\company-cms-updated\resources\views/admin/messages/index.blade.php ENDPATH**/ ?>