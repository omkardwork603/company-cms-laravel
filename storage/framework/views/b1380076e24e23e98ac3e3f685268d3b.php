<header class="border-b bg-white">

    <div class="max-w-7xl mx-auto px-6">

        <div class="flex items-center justify-between h-20">


            

            <a
                href="<?php echo e(url('/')); ?>"
                class="flex items-center"
            >

                <?php if($settings?->logo): ?>

                    <img
                        src="<?php echo e(asset('storage/' . $settings->logo)); ?>"
                        alt="<?php echo e($settings?->site_name); ?>"
                        class="h-12 w-auto"
                    >

                <?php else: ?>

                    <span class="text-xl font-bold">
                        <?php echo e($settings?->site_name ?? 'Company'); ?>

                    </span>

                <?php endif; ?>

            </a>


            

            <nav>

                <ul class="flex items-center gap-8">

                    <?php if(isset($headerMenu) && $headerMenu->items && $headerMenu->items->count() > 0): ?>

                        <?php $__currentLoopData = $headerMenu->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <li>

                                <a
                                    href="<?php echo e(str_starts_with($item->url, 'http') || str_starts_with($item->url, '/') ? $item->url : url($item->url)); ?>"
                                    <?php if(!empty($item->target)): ?> target="<?php echo e($item->target); ?>" <?php endif; ?>
                                    class="text-gray-700 hover:text-black font-medium transition"
                                >
                                    <?php echo e($item->title); ?>

                                </a>

                            </li>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php elseif(isset($menus) && $menus->count() > 0 && $menus->first()->items->count() > 0): ?>

                        <?php $__currentLoopData = $menus->first()->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <li>

                                <a
                                    href="<?php echo e(str_starts_with($item->url, 'http') || str_starts_with($item->url, '/') ? $item->url : url($item->url)); ?>"
                                    <?php if(!empty($item->target)): ?> target="<?php echo e($item->target); ?>" <?php endif; ?>
                                    class="text-gray-700 hover:text-black font-medium transition"
                                >
                                    <?php echo e($item->title); ?>

                                </a>

                            </li>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php else: ?>

                        <li><a href="<?php echo e(route('home')); ?>" class="text-gray-700 hover:text-black font-medium">Home</a></li>
                        <li><a href="<?php echo e(route('about')); ?>" class="text-gray-700 hover:text-black font-medium">About</a></li>
                        <li><a href="<?php echo e(route('services')); ?>" class="text-gray-700 hover:text-black font-medium">Services</a></li>
                        <li><a href="<?php echo e(route('products')); ?>" class="text-gray-700 hover:text-black font-medium">Products</a></li>
                        <li><a href="<?php echo e(route('projects')); ?>" class="text-gray-700 hover:text-black font-medium">Projects</a></li>
                        <li><a href="<?php echo e(route('blog')); ?>" class="text-gray-700 hover:text-black font-medium">Blog</a></li>

                    <?php endif; ?>

                </ul>

            </nav>


            

            <a
                href="<?php echo e(route('contact')); ?>"
                class="bg-gray-900 text-white px-5 py-3 rounded-lg"
            >
                Contact Us
            </a>

        </div>

    </div>

</header><?php /**PATH C:\wamp64\www\company-cms-laravel\company-cms\new\update new\company-cms-updated\resources\views/frontend/layouts/header.blade.php ENDPATH**/ ?>