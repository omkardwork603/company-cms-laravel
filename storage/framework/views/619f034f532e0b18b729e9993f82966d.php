<?php $__env->startSection('title', 'Projects'); ?>

<?php $__env->startSection('content'); ?>

<section class="py-20">

    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-12">

            <h1 class="text-4xl font-bold">
                Our Projects
            </h1>

            <p class="text-gray-500 mt-4">
                Explore our latest projects and work.
            </p>

        </div>


        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            <?php $__empty_1 = true; $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                <div class="border rounded-xl overflow-hidden">

                    <?php if($project->featured_image): ?>

                        <img
                            src="<?php echo e(Storage::url($project->featured_image)); ?>"
                            alt="<?php echo e($project->title); ?>"
                            class="w-full h-56 object-cover"
                        >

                    <?php else: ?>

                        <div class="w-full h-56 bg-gray-100 flex items-center justify-center">
                            No Image
                        </div>

                    <?php endif; ?>


                    <div class="p-6">

                        <?php if($project->category): ?>

                            <p class="text-sm text-gray-500">
                                <?php echo e($project->category); ?>

                            </p>

                        <?php endif; ?>


                        <h2 class="text-xl font-bold mt-2">
                            <?php echo e($project->title); ?>

                        </h2>


                        <?php if($project->client_name): ?>

                            <p class="text-sm text-gray-500 mt-2">
                                Client: <?php echo e($project->client_name); ?>

                            </p>

                        <?php endif; ?>


                        <p class="text-gray-600 mt-4">
                            <?php echo e($project->short_description); ?>

                        </p>


                        <a
                            href="<?php echo e(route('projects.show', $project)); ?>"
                            class="inline-block mt-5 text-blue-600"
                        >
                            View Project →
                        </a>

                    </div>

                </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                <div class="col-span-full text-center text-gray-500">
                    No projects available.
                </div>

            <?php endif; ?>

        </div>

    </div>

</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\company-cms-laravel\company-cms\new\update new\company-cms-updated\resources\views/frontend/projects/index.blade.php ENDPATH**/ ?>