<?php $__env->startSection('title', 'Media Library'); ?>

<?php $__env->startSection('page-title', 'Media Library'); ?>

<?php $__env->startSection('content'); ?>

<div>

    

    <div class="flex justify-between items-center mb-8">

        <div>

            <h1 class="text-2xl font-bold">
                Media Library
            </h1>

            <p class="text-gray-500 mt-1">
                Manage images and files used across your website.
            </p>

        </div>


        <a
            href="<?php echo e(route('admin.media.create')); ?>"
            class="bg-gray-900 text-white px-5 py-3 rounded-lg"
        >
            + Upload Media
        </a>

    </div>


    

    <?php if(session('success')): ?>

        <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-6">

            <?php echo e(session('success')); ?>


        </div>

    <?php endif; ?>


    

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

        <?php $__empty_1 = true; $__currentLoopData = $media; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

            <div class="bg-white rounded-xl shadow border overflow-hidden">


                

                <div class="h-48 bg-gray-100 flex items-center justify-center">

                    <?php if($item->isImage()): ?>

                        <img
                            src="<?php echo e($item->url); ?>"
                            alt="<?php echo e($item->alt_text ?? $item->name); ?>"
                            class="w-full h-full object-cover"
                        >

                    <?php else: ?>

                        <div class="text-center">

                            <div class="text-4xl mb-2">
                                📄
                            </div>

                            <p class="text-gray-500 text-sm">
                                <?php echo e(strtoupper($item->mime_type ?? 'FILE')); ?>

                            </p>

                        </div>

                    <?php endif; ?>

                </div>


                

                <div class="p-4">

                    <h3 class="font-semibold truncate">
                        <?php echo e($item->name); ?>

                    </h3>

                    <p class="text-sm text-gray-500 mt-1 truncate">
                        <?php echo e($item->file_name); ?>

                    </p>


                    <?php if($item->file_size): ?>

                        <p class="text-xs text-gray-400 mt-2">

                            <?php echo e(number_format($item->file_size / 1024, 1)); ?>

                            KB

                        </p>

                    <?php endif; ?>


                    

                    <div class="flex justify-between items-center mt-4">

                        <a
                            href="<?php echo e($item->url); ?>"
                            target="_blank"
                            class="text-blue-600 text-sm"
                        >
                            Open
                        </a>


                        <form
                            action="<?php echo e(route('admin.media.destroy', $item)); ?>"
                            method="POST"
                            onsubmit="return confirm('Delete this media file?')"
                        >

                            <?php echo csrf_field(); ?>

                            <?php echo method_field('DELETE'); ?>

                            <button
                                class="text-red-600 text-sm"
                            >
                                Delete
                            </button>

                        </form>

                    </div>

                </div>

            </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

            <div class="col-span-full">

                <div class="bg-white border rounded-xl p-12 text-center">

                    <h2 class="text-xl font-semibold">
                        No media found
                    </h2>

                    <p class="text-gray-500 mt-2">
                        Upload your first image or file.
                    </p>

                </div>

            </div>

        <?php endif; ?>

    </div>


    

    <div class="mt-8">

        <?php echo e($media->links()); ?>


    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\company-cms-laravel\company-cms\new\update new\company-cms-updated\resources\views/admin/media/index.blade.php ENDPATH**/ ?>