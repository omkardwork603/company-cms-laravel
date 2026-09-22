<?php $__env->startSection('title', $post->title); ?>

<?php $__env->startSection('content'); ?>

<article class="py-16">

    <div class="max-w-4xl mx-auto px-6">


        
        <?php if($post->category): ?>

            <a
                href="<?php echo e(route('blog.index', ['category' => $post->category->slug])); ?>"
                class="text-blue-600"
            >
                <?php echo e($post->category->name); ?>

            </a>

        <?php endif; ?>


        
        <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mt-4">

            <?php echo e($post->title); ?>


        </h1>


        
        <div class="flex flex-wrap gap-5 text-gray-500 mt-5">

            <span>
                By <?php echo e($post->author ?? 'Admin'); ?>

            </span>

            <?php if($post->published_at): ?>

                <span>
                    <?php echo e($post->published_at->format('F d, Y')); ?>

                </span>

            <?php endif; ?>

        </div>


        
        <?php if($post->featured_image): ?>

            <div class="mt-10">

                <img
                    src="<?php echo e(Storage::url($post->featured_image)); ?>"
                    alt="<?php echo e($post->title); ?>"
                    class="w-full rounded-xl"
                >

            </div>

        <?php endif; ?>


        
        <?php if($post->excerpt): ?>

            <div class="mt-10 text-xl text-gray-600">

                <?php echo e($post->excerpt); ?>


            </div>

        <?php endif; ?>


        
        <div class="mt-10 prose prose-lg max-w-none">

            <?php echo nl2br(e($post->content)); ?>


        </div>


        
        <div class="mt-12">

            <a
                href="<?php echo e(route('blog.index')); ?>"
                class="text-blue-600"
            >
                ← Back to Blog
            </a>

        </div>

    </div>

</article>



<?php if($relatedPosts->count()): ?>

<section class="py-16 bg-gray-50">

    <div class="max-w-7xl mx-auto px-6">

        <h2 class="text-3xl font-bold mb-8">
            Related Posts
        </h2>


        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            <?php $__currentLoopData = $relatedPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <article class="bg-white border rounded-xl overflow-hidden">

                    <?php if($related->featured_image): ?>

                        <img
                            src="<?php echo e(asset('storage/' . $related->featured_image)); ?>"
                            alt="<?php echo e($related->title); ?>"
                            class="w-full h-48 object-cover"
                        >

                    <?php endif; ?>


                    <div class="p-6">

                        <h3 class="text-xl font-bold">

                            <a
                                href="<?php echo e(route('blog.show', $related)); ?>"
                            >
                                <?php echo e($related->title); ?>

                            </a>

                        </h3>


                        <?php if($related->excerpt): ?>

                            <p class="text-gray-600 mt-3">
                                <?php echo e($related->excerpt); ?>

                            </p>

                        <?php endif; ?>


                        <a
                            href="<?php echo e(route('blog.show', $related)); ?>"
                            class="inline-block mt-4 text-blue-600"
                        >
                            Read More →
                        </a>

                    </div>

                </article>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>

    </div>

</section>

<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\company-cms-laravel\company-cms\new\update new\company-cms-updated\resources\views/frontend/blog/show.blade.php ENDPATH**/ ?>