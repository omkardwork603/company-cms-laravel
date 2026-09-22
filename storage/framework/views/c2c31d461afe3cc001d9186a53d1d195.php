<?php $__env->startSection('title', 'View Message'); ?>

<?php $__env->startSection('page-title', 'View Message'); ?>

<?php $__env->startSection('content'); ?>

<div class="max-w-4xl">

    <div class="bg-white rounded-lg shadow p-8">


        

        <div class="flex justify-between items-start mb-8">

            <div>

                <h1 class="text-2xl font-bold">
                    <?php echo e($message->subject ?? 'Contact Message'); ?>

                </h1>

                <p class="text-gray-500 mt-2">
                    Received <?php echo e($message->created_at->format('d M Y, h:i A')); ?>

                </p>

            </div>


            <?php if($message->status === 'read'): ?>

                <span class="text-green-600">
                    Read
                </span>

            <?php else: ?>

                <span class="text-red-600">
                    Unread
                </span>

            <?php endif; ?>

        </div>


        

        <div class="border-b pb-6 mb-6">

            <h2 class="font-semibold text-lg mb-4">
                Sender Information
            </h2>


            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                <div>

                    <p class="text-sm text-gray-500">
                        Name
                    </p>

                    <p class="font-medium">
                        <?php echo e($message->name); ?>

                    </p>

                </div>


                <div>

                    <p class="text-sm text-gray-500">
                        Email
                    </p>

                    <p class="font-medium">
                        <?php echo e($message->email); ?>

                    </p>

                </div>


                <div>

                    <p class="text-sm text-gray-500">
                        Phone
                    </p>

                    <p class="font-medium">
                        <?php echo e($message->phone ?? '—'); ?>

                    </p>

                </div>


                <div>

                    <p class="text-sm text-gray-500">
                        Subject
                    </p>

                    <p class="font-medium">
                        <?php echo e($message->subject ?? '—'); ?>

                    </p>

                </div>

            </div>

        </div>


        

        <div>

            <h2 class="font-semibold text-lg mb-4">
                Message
            </h2>

            <div class="bg-gray-50 rounded-lg p-6 whitespace-pre-line">

                <?php echo e($message->message); ?>


            </div>

        </div>


        

        <div class="flex justify-between items-center mt-8">


            <a
                href="<?php echo e(route('admin.messages.index')); ?>"
                class="text-gray-600"
            >
                ← Back to Messages
            </a>


            <div class="flex gap-3">

                <?php if($message->status === 'read'): ?>

                    <form
                        action="<?php echo e(route('admin.messages.unread', $message)); ?>"
                        method="POST"
                    >

                        <?php echo csrf_field(); ?>

                        <?php echo method_field('PATCH'); ?>

                        <button
                            class="bg-gray-200 px-5 py-3 rounded-lg"
                        >
                            Mark Unread
                        </button>

                    </form>

                <?php endif; ?>


                <form
                    action="<?php echo e(route('admin.messages.destroy', $message)); ?>"
                    method="POST"
                    onsubmit="return confirm('Delete this message?')"
                >

                    <?php echo csrf_field(); ?>

                    <?php echo method_field('DELETE'); ?>

                    <button
                        class="bg-red-600 text-white px-5 py-3 rounded-lg"
                    >
                        Delete
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\company-cms-laravel\company-cms\new\update new\company-cms-updated\resources\views/admin/messages/show.blade.php ENDPATH**/ ?>