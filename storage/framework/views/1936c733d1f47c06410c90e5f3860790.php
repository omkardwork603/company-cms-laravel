<?php $__env->startSection('title', $project->title); ?>

<?php $__env->startSection('content'); ?>

<section class="py-20">

    <div class="max-w-6xl mx-auto px-6">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

            
            <div>

                <?php if($project->featured_image): ?>

                    <img
                        src="<?php echo e(Storage::url($project->featured_image)); ?>"
                        alt="<?php echo e($project->title); ?>"
                        class="w-full rounded-xl"
                    >

                <?php else: ?>

                    <div class="bg-gray-100 h-96 rounded-xl flex items-center justify-center">
                        No Image
                    </div>

                <?php endif; ?>

            </div>


            
            <div>

                <?php if($project->category): ?>

                    <p class="text-gray-500">
                        <?php echo e($project->category); ?>

                    </p>

                <?php endif; ?>


                <h1 class="text-4xl font-bold mt-2">
                    <?php echo e($project->title); ?>

                </h1>


                <?php if($project->client_name): ?>

                    <p class="mt-4 text-gray-600">
                        Client:
                        <?php echo e($project->client_name); ?>

                    </p>

                <?php endif; ?>


                <?php if($project->short_description): ?>

                    <p class="text-lg text-gray-600 mt-6">
                        <?php echo e($project->short_description); ?>

                    </p>

                <?php endif; ?>


                <div class="mt-8 text-gray-700 leading-8 whitespace-pre-line">

                    <?php echo e($project->description); ?>


                </div>


                <?php if($project->project_url): ?>

                    <div class="mt-8">

                        <a
                            href="<?php echo e($project->project_url); ?>"
                            target="_blank"
                            class="bg-gray-900 text-white px-6 py-3 rounded-lg"
                        >
                            Visit Project
                        </a>

                    </div>

                <?php endif; ?>


                <div class="mt-8">

                    <a
                        href="<?php echo e(route('projects.index')); ?>"
                        class="text-blue-600"
                    >
                        ← Back to Projects
                    </a>

                </div>

            </div>

        </div>

    </div>

</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\company-cms-laravel-ne\company-cms\resources\views/frontend/projects/show.blade.php ENDPATH**/ ?>