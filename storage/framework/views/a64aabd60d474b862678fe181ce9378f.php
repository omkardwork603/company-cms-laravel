<?php $__env->startSection('title', 'Blog'); ?>

<?php $__env->startSection('content'); ?>

<section class="py-16">

    <div class="max-w-7xl mx-auto px-6">


        
        <div class="text-center mb-12">

            <h1 class="text-4xl font-bold text-gray-900">
                Our Blog
            </h1>

            <p class="text-gray-500 mt-3">
                Latest news, insights and articles from our company.
            </p>

        </div>


        
        <div class="bg-gray-50 rounded-xl p-6 mb-10">

            <form
                action="<?php echo e(route('blog.index')); ?>"
                method="GET"
                class="grid grid-cols-1 md:grid-cols-3 gap-4"
            >

                
                <div class="md:col-span-2">

                    <input
                        type="text"
                        name="search"
                        value="<?php echo e(request('search')); ?>"
                        placeholder="Search blog posts..."
                        class="w-full border rounded-lg px-4 py-3"
                    >

                </div>


                
                <div>

                    <select
                        name="category"
                        class="w-full border rounded-lg px-4 py-3"
                        onchange="this.form.submit()"
                    >

                        <option value="">
                            All Categories
                        </option>

                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <option
                                value="<?php echo e($category->slug); ?>"
                                <?php echo e(request('category') === $category->slug ? 'selected' : ''); ?>

                            >
                                <?php echo e($category->name); ?>

                            </option>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </select>

                </div>


                
                <div>

                    <button
                        type="submit"
                        class="bg-gray-900 text-white px-6 py-3 rounded-lg"
                    >
                        Search
                    </button>

                </div>

            </form>

        </div>


        
        <?php if(request('search') || request('category')): ?>

            <div class="mb-8">

                <p class="text-gray-600">

                    Showing results

                    <?php if(request('search')): ?>
                        for <strong>"<?php echo e(request('search')); ?>"</strong>
                    <?php endif; ?>

                    <?php if(request('category')): ?>
                        in <strong><?php echo e(request('category')); ?></strong>
                    <?php endif; ?>

                </p>

                <a
                    href="<?php echo e(route('blog.index')); ?>"
                    class="text-blue-600 text-sm"
                >
                    Clear filters
                </a>

            </div>

        <?php endif; ?>


        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            <?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                <article class="bg-white border rounded-xl overflow-hidden">


                    
                    <?php if($post->featured_image): ?>

                        <img
                            src="<?php echo e(Storage::url($post->featured_image)); ?>"
                            alt="<?php echo e($post->title); ?>"
                            class="w-full h-56 object-cover"
                        >

                    <?php else: ?>

                        <div class="w-full h-56 bg-gray-100 flex items-center justify-center">

                            <span class="text-gray-400">
                                No Image
                            </span>

                        </div>

                    <?php endif; ?>


                    
                    <div class="p-6">


                        
                        <?php if($post->category): ?>

                            <a
                                href="<?php echo e(route('blog.index', ['category' => $post->category->slug])); ?>"
                                class="text-sm text-blue-600"
                            >
                                <?php echo e($post->category->name); ?>

                            </a>

                        <?php endif; ?>


                        
                        <h2 class="text-xl font-bold mt-3">

                            <a
                                href="<?php echo e(route('blog.show', $post)); ?>"
                                class="hover:underline"
                            >
                                <?php echo e($post->title); ?>

                            </a>

                        </h2>


                        
                        <?php if($post->excerpt): ?>

                            <p class="text-gray-600 mt-3 line-clamp-3">
                                <?php echo e($post->excerpt); ?>

                            </p>

                        <?php endif; ?>


                        
                        <div class="flex justify-between items-center mt-6 text-sm text-gray-500">

                            <span>
                                <?php echo e($post->author ?? 'Admin'); ?>

                            </span>

                            <?php if($post->published_at): ?>
                                <span>
                                    <?php echo e($post->published_at->format('M d, Y')); ?>

                                </span>
                            <?php endif; ?>

                        </div>


                        
                        <a
                            href="<?php echo e(route('blog.show', $post)); ?>"
                            class="inline-block mt-5 font-medium text-gray-900"
                        >
                            Read More →
                        </a>

                    </div>

                </article>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                <div class="col-span-full text-center py-16">

                    <h2 class="text-xl font-semibold">
                        No blog posts found.
                    </h2>

                    <p class="text-gray-500 mt-2">
                        Try another search or category.
                    </p>

                </div>

            <?php endif; ?>

        </div>


        
        <?php if($posts->hasPages()): ?>

            <div class="mt-12">

                <?php echo e($posts->links()); ?>


            </div>

        <?php endif; ?>

    </div>

</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\company-cms-laravel\company-cms\new\update new\company-cms-updated\resources\views/frontend/blog/index.blade.php ENDPATH**/ ?>