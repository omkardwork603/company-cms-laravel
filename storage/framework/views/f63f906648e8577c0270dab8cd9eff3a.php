<footer class="bg-gray-900 text-white mt-20">

    <div class="max-w-7xl mx-auto px-6 py-12">

        
        <div class="grid grid-cols-1 md:grid-cols-12 gap-10">

            
            <div class="md:col-span-5">

                <h2 class="text-2xl font-bold mb-4">
                    <?php echo e($settings?->site_name ?? 'Company'); ?>

                </h2>

                <?php if($settings?->details): ?>
                    <p class="text-gray-300 leading-relaxed" style="text-align: justify">
                        <?php echo e($settings->details); ?>

                    </p>
                <?php endif; ?>

            </div>


            
            <div class="md:col-span-3 ml-[60px]">

                <h3 class="text-lg font-semibold mb-4">
                    Quick Links
                </h3>

                <ul class="space-y-2">

                    <?php if(isset($footerMenu) && $footerMenu->items && $footerMenu->items->count() > 0): ?>

                        <?php $__currentLoopData = $footerMenu->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <li>
                                <a
                                    href="<?php echo e(str_starts_with($item->url, 'http') || str_starts_with($item->url, '/') ? $item->url : url($item->url)); ?>"
                                    <?php if(!empty($item->target)): ?>
                                        target="<?php echo e($item->target); ?>"
                                    <?php endif; ?>
                                    class="text-gray-300 hover:text-white transition"
                                >
                                    <?php echo e($item->title); ?>

                                </a>
                            </li>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php elseif(isset($headerMenu) && $headerMenu->items && $headerMenu->items->count() > 0): ?>

                        <?php $__currentLoopData = $headerMenu->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <li>
                                <a
                                    href="<?php echo e(str_starts_with($item->url, 'http') || str_starts_with($item->url, '/') ? $item->url : url($item->url)); ?>"
                                    <?php if(!empty($item->target)): ?>
                                        target="<?php echo e($item->target); ?>"
                                    <?php endif; ?>
                                    class="text-gray-300 hover:text-white transition"
                                >
                                    <?php echo e($item->title); ?>

                                </a>
                            </li>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php else: ?>

                        <li>
                            <a href="<?php echo e(route('home')); ?>"
                               class="text-gray-300 hover:text-white transition">
                                Home
                            </a>
                        </li>

                        <li>
                            <a href="<?php echo e(route('about')); ?>"
                               class="text-gray-300 hover:text-white transition">
                                About
                            </a>
                        </li>

                        <li>
                            <a href="<?php echo e(route('services')); ?>"
                               class="text-gray-300 hover:text-white transition">
                                Services
                            </a>
                        </li>

                        <li>
                            <a href="<?php echo e(route('products')); ?>"
                               class="text-gray-300 hover:text-white transition">
                                Products
                            </a>
                        </li>

                        <li>
                            <a href="<?php echo e(route('projects')); ?>"
                               class="text-gray-300 hover:text-white transition">
                                Projects
                            </a>
                        </li>

                        <li>
                            <a href="<?php echo e(route('blog')); ?>"
                               class="text-gray-300 hover:text-white transition">
                                Blog
                            </a>
                        </li>

                        <li>
                            <a href="<?php echo e(route('contact')); ?>"
                               class="text-gray-300 hover:text-white transition">
                                Contact
                            </a>
                        </li>

                    <?php endif; ?>

                </ul>

            </div>


            
            <div class="md:col-span-4">

                <h3 class="text-lg font-semibold mb-4">
                    Contact
                </h3>

                <?php if($settings?->contact_email): ?>
                    <p class="text-gray-300 mb-2">
                        <span class="font-medium text-white">Email:</span>
                        <?php echo e($settings->contact_email); ?>

                    </p>
                <?php endif; ?>

                <?php if($settings?->contact_phone): ?>
                    <p class="text-gray-300 mb-2">
                        <span class="font-medium text-white">Phone:</span>
                        <?php echo e($settings->contact_phone); ?>

                    </p>
                <?php endif; ?>

                <?php if($settings?->address): ?>
                    <p class="text-gray-300 leading-relaxed">
                        <?php echo e($settings->address); ?>

                    </p>
                <?php endif; ?>

            </div>

        </div>


        
        <div class="border-t border-gray-700 mt-10 pt-6">

            <p class="text-gray-400 text-center">
                <?php echo e($settings?->footer_text); ?>

            </p>

        </div>

    </div>

</footer><?php /**PATH C:\wamp64\www\company-cms-laravel-ne\company-cms\resources\views/frontend/layouts/footer.blade.php ENDPATH**/ ?>