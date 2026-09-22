<?php $__env->startSection('title', $settings?->company_name ?? 'Home'); ?>

<?php $__env->startSection('content'); ?>



<section class="bg-gray-50">

    <div class="max-w-7xl mx-auto px-6 py-24">

        <div class="grid lg:grid-cols-2 gap-12 items-center">

            
            <div>

                <span class="inline-block mb-5 text-sm font-semibold uppercase tracking-wider text-gray-500">
                    Welcome to <?php echo e($settings?->site_name ?? $settings?->company_name ?? 'Our Company'); ?>

                </span>

                <h1 class="text-4xl md:text-6xl font-bold leading-tight">
                    <?php echo e($settings?->site_tagline ?? $settings?->tagline ?? 'Building Better Solutions for Your Business'); ?>

                </h1>

                <p class="mt-6 text-lg text-gray-600 max-w-xl">
                    <?php echo e($settings?->details ?? 'We provide innovative solutions designed to help businesses grow, improve performance and achieve long-term success.'); ?>

                </p>

                <div class="mt-8 flex flex-wrap gap-4">

                    <a
                        href="<?php echo e(route('services.index')); ?>"
                        class="px-6 py-3 bg-gray-900 text-white rounded-lg font-semibold hover:bg-gray-700 transition"
                    >
                        Our Services
                    </a>

                    <a
                        href="<?php echo e(route('contact')); ?>"
                        class="px-6 py-3 border border-gray-300 rounded-lg font-semibold hover:bg-gray-100 transition"
                    >
                        Contact Us
                    </a>

                </div>

            </div>


            
            <div>

                <?php if(!empty($settings?->hero_image)): ?>

                    <img
                        src="<?php echo e(asset('storage/' . $settings->hero_image)); ?>"
                        alt="<?php echo e($settings?->company_name ?? 'Company'); ?>"
                        class="w-full aspect-video object-cover rounded-2xl"
                    >

                <?php else: ?>

                    <div class="aspect-video bg-gray-200 rounded-2xl flex items-center justify-center">
                        <span class="text-gray-500">
                            Company Image
                        </span>
                    </div>

                <?php endif; ?>

            </div>

        </div>

    </div>

</section>




<?php if(!empty($settings?->details)): ?>
<section class="py-16 bg-white border-b border-gray-100">

    <div class="max-w-7xl mx-auto px-6">

        <div class="max-w-4xl mx-auto text-center">

            <span class="text-sm font-semibold uppercase tracking-wider text-blue-600">
                Company Details
            </span>

            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-2 mb-6">
                About <?php echo e($settings?->site_name ?? 'Our Company'); ?>

            </h2>

            

        </div>

    </div>

</section>
<?php endif; ?>




<section class="py-20">

    <div class="max-w-7xl mx-auto px-6">

        <div class="grid lg:grid-cols-2 gap-12 items-center">

            
            <div>

                <?php if(!empty($aboutPage?->featured_image)): ?>

                    <img
                        src="<?php echo e(asset('storage/' . $aboutPage->featured_image)); ?>"
                        alt="<?php echo e($aboutPage->title ?? 'About Us'); ?>"
                        class="w-auto aspect-square object-cover rounded-2xl shadow-md"
                    >

                <?php elseif(!empty($settings?->hero_image)): ?>

                    <img
                        src="<?php echo e(asset('storage/' . $settings->hero_image)); ?>"
                        alt="About Us"
                        class="w-full h-96 aspect-square object-cover rounded-2xl shadow-md"
                    >

                <?php else: ?>

                    <div class="aspect-square bg-gray-100 rounded-2xl flex items-center justify-center">

                        <span class="text-gray-400 font-medium">
                            About Us Image
                        </span>

                    </div>

                <?php endif; ?>

            </div>


            
            <div>

                <span class="text-sm font-semibold uppercase tracking-wider text-blue-600">
                    About Us
                </span>

                <h2 class="text-3xl md:text-4xl font-bold mt-3 text-gray-900">
                    <?php echo e($aboutPage?->title ?? 'We help businesses move forward'); ?>

                </h2>

                <div class="mt-5 text-gray-600 leading-relaxed space-y-4 prose max-w-none">
                    <?php if(!empty($aboutPage?->content)): ?>
                        <?php echo Str::limit(strip_tags($aboutPage->content), 300); ?>

                    <?php elseif(!empty($settings?->details)): ?>
                        <p><?php echo e($settings->details); ?></p>
                    <?php else: ?>
                        <p>
                            We combine technology, creativity and business
                            knowledge to create reliable solutions for our
                            customers.
                        </p>
                    <?php endif; ?>
                </div>

                <a
                    href="<?php echo e(route('about')); ?>"
                    class="inline-flex items-center gap-2 mt-7 px-5 py-2.5 rounded-lg bg-gray-900 text-white font-semibold text-sm hover:bg-gray-800 transition"
                >
                    <span>Read More</span>
                    <span>→</span>
                </a>

            </div>

        </div>

    </div>

</section>




<section class="py-20 bg-gray-50">

    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center max-w-2xl mx-auto mb-12">

            <span class="text-sm font-semibold uppercase text-gray-500">
                What We Do
            </span>

            <h2 class="text-3xl md:text-4xl font-bold mt-3">
                Our Services
            </h2>

            <p class="mt-4 text-gray-600">
                Professional services designed for modern businesses.
            </p>

        </div>


        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

            <?php $__empty_1 = true; $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                <article class="bg-white border rounded-xl overflow-hidden hover:shadow-lg transition">

                    
                    <?php if($service->image): ?>

                        <img
                            src="<?php echo e(Storage::url($service->image)); ?>"
                            alt="<?php echo e($service->title); ?>"
                            class="w-full h-48 object-cover"
                        >

                    <?php else: ?>

                        <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
                            <span class="text-gray-400">
                                No Image
                            </span>
                        </div>

                    <?php endif; ?>


                    <div class="p-6">

                        <h3 class="text-xl font-bold">
                            <?php echo e($service->title); ?>

                        </h3>

                        <p class="mt-3 text-gray-600">
                            <?php echo e(Str::limit(strip_tags($service->description ?? ''), 120)); ?>

                        </p>

                        <a
                            href="<?php echo e(route('services.show', $service->slug)); ?>"
                            class="inline-block mt-5 font-semibold hover:underline"
                        >
                            Learn More →
                        </a>

                    </div>

                </article>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                <div class="col-span-full text-center py-10">

                    <p class="text-gray-500">
                        No services available.
                    </p>

                </div>

            <?php endif; ?>

        </div>


        <div class="text-center mt-10">

            <a
                href="<?php echo e(route('services.index')); ?>"
                class="font-semibold hover:underline"
            >
                View All Services →
            </a>

        </div>

    </div>

</section>




<section class="py-20">

    <div class="max-w-7xl mx-auto px-6">

        <div class="flex items-end justify-between mb-10">

            <div>

                <span class="text-sm font-semibold uppercase text-gray-500">
                    Our Products
                </span>

                <h2 class="text-3xl font-bold mt-2">
                    Featured Products
                </h2>

            </div>


            <a
                href="<?php echo e(route('products.index')); ?>"
                class="font-semibold hidden md:block hover:underline"
            >
                View All →
            </a>

        </div>


        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

            <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                <article class="border rounded-xl overflow-hidden hover:shadow-lg transition">

                    
                    <?php if($product->image): ?>

                        <img
                            src="<?php echo e(Storage::url($product->image)); ?>"
                            alt="<?php echo e($product->name); ?>"
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

                        <h3 class="text-xl font-bold">
                            <?php echo e($product->name); ?>

                        </h3>

                        <p class="mt-3 text-gray-600">
                            <?php echo e(Str::limit(strip_tags($product->description ?? ''), 100)); ?>

                        </p>

                    </div>

                </article>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                <div class="col-span-full text-center py-10">

                    <p class="text-gray-500">
                        No products available.
                    </p>

                </div>

            <?php endif; ?>

        </div>

    </div>

</section>




<section class="py-20 bg-gray-50">

    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-12">

            <span class="text-sm font-semibold uppercase text-gray-500">
                Our Work
            </span>

            <h2 class="text-3xl md:text-4xl font-bold mt-2">
                Recent Projects
            </h2>

        </div>


        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

            <?php $__empty_1 = true; $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                <article class="bg-white rounded-xl overflow-hidden border hover:shadow-lg transition">

                    
                    <?php if($project->featured_image): ?>

                        <img
                            src="<?php echo e(Storage::url($project->featured_image)); ?>"
                            alt="<?php echo e($project->title); ?>"
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

                        <h3 class="text-xl font-bold">
                            <?php echo e($project->title); ?>

                        </h3>

                        <p class="mt-3 text-gray-600">
                            <?php echo e(Str::limit(strip_tags($project->description ?? ''), 100)); ?>

                        </p>

                    </div>

                </article>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                <div class="col-span-full text-center py-10">

                    <p class="text-gray-500">
                        No projects available.
                    </p>

                </div>

            <?php endif; ?>

        </div>


        <div class="text-center mt-10">

            <a
                href="<?php echo e(route('projects.index')); ?>"
                class="font-semibold hover:underline"
            >
                View All Projects →
            </a>

        </div>

    </div>

</section>




<section class="py-20">

    <div class="max-w-7xl mx-auto px-6">

        <div class="flex items-end justify-between mb-10">

            <div>

                <span class="text-sm font-semibold uppercase text-gray-500">
                    Latest Articles
                </span>

                <h2 class="text-3xl md:text-4xl font-bold mt-2">
                    From Our Blog
                </h2>

            </div>


            <a
                href="<?php echo e(route('blog.index')); ?>"
                class="font-semibold hidden md:block hover:underline"
            >
                View All →
            </a>

        </div>


        <?php if(isset($posts) && $posts->count()): ?>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <article class="border rounded-xl overflow-hidden hover:shadow-lg transition">

                        <?php if($post->featured_image): ?>

                            <img
                                src="<?php echo e(asset('storage/' . $post->featured_image)); ?>"
                                alt="<?php echo e($post->title); ?>"
                                class="w-full h-52 object-cover"
                            >

                        <?php else: ?>

                            <div class="w-full h-52 bg-gray-100 flex items-center justify-center">
                                <span class="text-gray-400">
                                    No Image
                                </span>
                            </div>

                        <?php endif; ?>


                        <div class="p-6">

                            <?php if($post->category): ?>

                                <span class="text-sm text-gray-500">
                                    <?php echo e($post->category->name); ?>

                                </span>

                            <?php endif; ?>

                            <h3 class="text-xl font-bold mt-2">
                                <?php echo e($post->title); ?>

                            </h3>

                            <p class="mt-3 text-gray-600">
                                <?php echo e(Str::limit(strip_tags($post->excerpt ?? $post->content ?? ''), 120)); ?>

                            </p>

                            <a
                                href="<?php echo e(route('blog.show', $post->slug)); ?>"
                                class="inline-block mt-5 font-semibold hover:underline"
                            >
                                Read More →
                            </a>

                        </div>

                    </article>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>

        <?php else: ?>

            <div class="text-center py-10">

                <p class="text-gray-500">
                    No blog posts available.
                </p>

            </div>

        <?php endif; ?>

    </div>

</section>




<section class="py-20">

    <div class="max-w-5xl mx-auto px-6">

        <div class="bg-gray-900 text-white rounded-2xl p-10 md:p-16 text-center">

            <h2 class="text-3xl md:text-4xl font-bold">
                Ready to work with us?
            </h2>

            <p class="mt-4 text-gray-300 max-w-2xl mx-auto">
                Let's discuss how we can help your business
                achieve its goals.
            </p>

            <a
                href="<?php echo e(route('contact')); ?>"
                class="inline-block mt-8 px-7 py-3 bg-white text-gray-900 rounded-lg font-semibold hover:bg-gray-100 transition"
            >
                Contact Us
            </a>

        </div>

    </div>

</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\company-cms-laravel\company-cms\new\update new\company-cms-updated\resources\views/frontend/layout/home.blade.php ENDPATH**/ ?>