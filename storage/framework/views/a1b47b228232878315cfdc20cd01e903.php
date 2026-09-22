<?php $__env->startSection('title', 'View Team Member'); ?>

<?php $__env->startSection('page-title', 'View Team Member'); ?>

<?php $__env->startSection('content'); ?>

<div class="max-w-5xl">

    <div class="bg-white rounded-lg shadow p-8">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            
            <div>

                <?php if($team->profile_image): ?>

                    <img
                        src="<?php echo e(asset('storage/' . $team->profile_image)); ?>"
                        alt="<?php echo e($team->name); ?>"
                        class="w-full rounded-xl"
                    >

                <?php else: ?>

                    <div class="h-64 bg-gray-100 rounded-xl flex items-center justify-center">
                        No Image
                    </div>

                <?php endif; ?>

            </div>


            
            <div class="md:col-span-2">

                <h1 class="text-3xl font-bold text-gray-800">
                    <?php echo e($team->name); ?>

                </h1>


                <?php if($team->designation): ?>

                    <p class="text-lg text-gray-500 mt-2">
                        <?php echo e($team->designation); ?>

                    </p>

                <?php endif; ?>


                <?php if($team->department): ?>

                    <p class="text-gray-500 mt-2">
                        <?php echo e($team->department); ?>

                    </p>

                <?php endif; ?>


                <div class="mt-6">

                    <strong>
                        Email:
                    </strong>

                    <p class="text-gray-600">
                        <?php echo e($team->email ?? '—'); ?>

                    </p>

                </div>


                <div class="mt-4">

                    <strong>
                        Phone:
                    </strong>

                    <p class="text-gray-600">
                        <?php echo e($team->phone ?? '—'); ?>

                    </p>

                </div>


                <div class="mt-4">

                    <strong>
                        Status:
                    </strong>

                    <?php if($team->status): ?>

                        <span class="text-green-600">
                            Active
                        </span>

                    <?php else: ?>

                        <span class="text-gray-500">
                            Draft
                        </span>

                    <?php endif; ?>

                </div>

            </div>

        </div>


        
        <div class="mt-10">

            <h2 class="text-xl font-bold mb-3">
                Biography
            </h2>

            <div class="text-gray-600 whitespace-pre-line">
                <?php echo e($team->bio); ?>

            </div>

        </div>


        
        <div class="mt-8">

            <h2 class="text-xl font-bold mb-4">
                Social Links
            </h2>

            <div class="flex gap-4">

                <?php if($team->linkedin_url): ?>

                    <a
                        href="<?php echo e($team->linkedin_url); ?>"
                        target="_blank"
                        class="text-blue-600"
                    >
                        LinkedIn
                    </a>

                <?php endif; ?>


                <?php if($team->twitter_url): ?>

                    <a
                        href="<?php echo e($team->twitter_url); ?>"
                        target="_blank"
                        class="text-blue-600"
                    >
                        Twitter / X
                    </a>

                <?php endif; ?>


                <?php if($team->facebook_url): ?>

                    <a
                        href="<?php echo e($team->facebook_url); ?>"
                        target="_blank"
                        class="text-blue-600"
                    >
                        Facebook
                    </a>

                <?php endif; ?>

            </div>

        </div>


        
        <div class="mt-10 flex gap-3">

            <a
                href="<?php echo e(route('admin.team.edit', $team)); ?>"
                class="bg-gray-900 text-white px-6 py-3 rounded-lg"
            >
                Edit Team Member
            </a>

            <a
                href="<?php echo e(route('admin.team.index')); ?>"
                class="bg-gray-200 px-6 py-3 rounded-lg"
            >
                Back
            </a>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\company-cms-laravel\company-cms\new\update new\company-cms-updated\resources\views/admin/team/show.blade.php ENDPATH**/ ?>