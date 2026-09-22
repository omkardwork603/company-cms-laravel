<?php $__env->startSection('title', 'Contact Us'); ?>

<?php $__env->startSection('content'); ?>

<section class="bg-gray-50 py-16 lg:py-24">

    <div class="max-w-7xl mx-auto px-6">

        
        <div class="text-center max-w-2xl mx-auto mb-14">

            <span class="inline-block text-sm font-semibold uppercase tracking-wider text-blue-600 mb-3">
                Contact Us
            </span>

            <h1 class="text-4xl md:text-5xl font-bold text-gray-900">
                Let's Get In Touch
            </h1>

            <p class="mt-4 text-lg text-gray-600">
                Have a question, project idea, or need some help?
                Send us a message and our team will get back to you.
            </p>

        </div>


        
        <?php if(session('success')): ?>

            <div class="max-w-4xl mx-auto mb-8">

                <div class="flex items-center gap-3 rounded-xl bg-green-50 border border-green-200 px-5 py-4 text-green-700">

                    <svg class="w-6 h-6 flex-shrink-0"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M5 13l4 4L19 7"/>

                    </svg>

                    <span>
                        <?php echo e(session('success')); ?>

                    </span>

                </div>

            </div>

        <?php endif; ?>


        
        <?php if($errors->any()): ?>

            <div class="max-w-4xl mx-auto mb-8">

                <div class="rounded-xl bg-red-50 border border-red-200 px-5 py-4 text-red-700">

                    <div class="flex items-center gap-2 font-semibold mb-2">

                        <svg class="w-5 h-5"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M12 8v4m0 4h.01M10.29 3.86l-7.82 14a2 2 0 001.74 3h15.58a2 2 0 001.74-3l-7.82-14a2 2 0 00-3.42 0z"/>

                        </svg>

                        Please fix the following errors:
                    </div>

                    <ul class="list-disc ml-7 space-y-1 text-sm">

                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <li>
                                <?php echo e($error); ?>

                            </li>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </ul>

                </div>

            </div>

        <?php endif; ?>


        
        <div class="grid grid-cols-1 lg:grid-cols-5 gap-8 lg:gap-12">


            
            <div class="lg:col-span-2">

                <div class="bg-gray-900 text-white rounded-2xl p-8 lg:p-10 h-full">

                    <span class="text-blue-400 font-semibold text-sm uppercase tracking-wider">
                        Contact Information
                    </span>

                    <h2 class="text-3xl font-bold mt-3">
                        We'd love to hear from you.
                    </h2>

                    <p class="text-gray-300 mt-4 leading-relaxed">
                        Whether you have a question about our services,
                        need support, or want to discuss a project,
                        our team is ready to help.
                    </p>


                    
                    <div class="mt-10 space-y-7">


                        
                        <div class="flex gap-4">

                            <div class="w-12 h-12 rounded-xl bg-white/10 flex items-center justify-center flex-shrink-0">

                                <svg class="w-6 h-6 text-blue-400"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M3 8l9 6 9-6M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>

                                </svg>

                            </div>

                            <div>

                                <p class="text-sm text-gray-400">
                                    Email
                                </p>

                                <a href="mailto:info@example.com"
                                   class="text-white font-medium hover:text-blue-400 transition">

                                    info@example.com

                                </a>

                            </div>

                        </div>


                        
                        <div class="flex gap-4">

                            <div class="w-12 h-12 rounded-xl bg-white/10 flex items-center justify-center flex-shrink-0">

                                <svg class="w-6 h-6 text-blue-400"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M3 5a2 2 0 012-2h3.28a1 1 0 01.95.68l1.5 4.49a1 1 0 01-.5 1.21l-2.15 1.08a11.05 11.05 0 005.5 5.5l1.08-2.15a1 1 0 011.21-.5l4.49 1.5a1 1 0 01.68.95V19a2 2 0 01-2 2h-1C9.72 21 3 14.28 3 6V5z"/>

                                </svg>

                            </div>

                            <div>

                                <p class="text-sm text-gray-400">
                                    Phone
                                </p>

                                <a href="tel:+919876543210"
                                   class="text-white font-medium hover:text-blue-400 transition">

                                    +91 98765 43210

                                </a>

                            </div>

                        </div>


                        
                        <div class="flex gap-4">

                            <div class="w-12 h-12 rounded-xl bg-white/10 flex items-center justify-center flex-shrink-0">

                                <svg class="w-6 h-6 text-blue-400"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M17.657 16.657L13.414 21a2 2 0 01-2.828 0l-4.243-4.343a8 8 0 1111.314 0z"/>

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>

                                </svg>

                            </div>

                            <div>

                                <p class="text-sm text-gray-400">
                                    Address
                                </p>

                                <p class="text-white font-medium">
                                    Mumbai, Maharashtra, India
                                </p>

                            </div>

                        </div>

                    </div>


                    
                    <div class="border-t border-gray-700 mt-10 pt-8">

                        <p class="text-sm text-gray-400">
                            Working Hours
                        </p>

                        <p class="text-white mt-1 font-medium">
                            Monday – Friday: 9:00 AM – 6:00 PM
                        </p>

                    </div>

                </div>

            </div>


            
            <div class="lg:col-span-3">

                <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-7 md:p-10">

                    <div class="mb-8">

                        <h2 class="text-2xl font-bold text-gray-900">
                            Send Us a Message
                        </h2>

                        <p class="text-gray-500 mt-2">
                            Fill out the form below and we'll respond as soon as possible.
                        </p>

                    </div>


                    <form
                        action="<?php echo e(route('contact.store')); ?>"
                        method="POST"
                        class="space-y-6"
                    >

                        <?php echo csrf_field(); ?>


                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


                            
                            <div>

                                <label for="name"
                                       class="block text-sm font-semibold text-gray-700 mb-2">

                                    Name
                                    <span class="text-red-500">*</span>

                                </label>

                                <input
                                    type="text"
                                    id="name"
                                    name="name"
                                    value="<?php echo e(old('name')); ?>"
                                    placeholder="Enter your name"
                                    class="w-full rounded-xl border border-gray-300 px-4 py-3.5
                                           focus:border-blue-500 focus:ring-2 focus:ring-blue-100
                                           outline-none transition
                                           <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    required
                                >

                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>

                                    <p class="text-red-500 text-sm mt-1">
                                        <?php echo e($message); ?>

                                    </p>

                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                            </div>


                            
                            <div>

                                <label for="email"
                                       class="block text-sm font-semibold text-gray-700 mb-2">

                                    Email
                                    <span class="text-red-500">*</span>

                                </label>

                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    value="<?php echo e(old('email')); ?>"
                                    placeholder="you@example.com"
                                    class="w-full rounded-xl border border-gray-300 px-4 py-3.5
                                           focus:border-blue-500 focus:ring-2 focus:ring-blue-100
                                           outline-none transition
                                           <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    required
                                >

                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>

                                    <p class="text-red-500 text-sm mt-1">
                                        <?php echo e($message); ?>

                                    </p>

                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                            </div>

                        </div>


                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


                            
                            <div>

                                <label for="phone"
                                       class="block text-sm font-semibold text-gray-700 mb-2">

                                    Phone

                                </label>

                                <input
                                    type="text"
                                    id="phone"
                                    name="phone"
                                    value="<?php echo e(old('phone')); ?>"
                                    placeholder="+91 98765 43210"
                                    class="w-full rounded-xl border border-gray-300 px-4 py-3.5
                                           focus:border-blue-500 focus:ring-2 focus:ring-blue-100
                                           outline-none transition
                                           <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                >

                                <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>

                                    <p class="text-red-500 text-sm mt-1">
                                        <?php echo e($message); ?>

                                    </p>

                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                            </div>


                            
                            <div>

                                <label for="subject"
                                       class="block text-sm font-semibold text-gray-700 mb-2">

                                    Subject

                                </label>

                                <input
                                    type="text"
                                    id="subject"
                                    name="subject"
                                    value="<?php echo e(old('subject')); ?>"
                                    placeholder="How can we help?"
                                    class="w-full rounded-xl border border-gray-300 px-4 py-3.5
                                           focus:border-blue-500 focus:ring-2 focus:ring-blue-100
                                           outline-none transition
                                           <?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                >

                                <?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>

                                    <p class="text-red-500 text-sm mt-1">
                                        <?php echo e($message); ?>

                                    </p>

                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                            </div>

                        </div>


                        
                        <div>

                            <label for="message"
                                   class="block text-sm font-semibold text-gray-700 mb-2">

                                Message
                                <span class="text-red-500">*</span>

                            </label>

                            <textarea
                                id="message"
                                name="message"
                                rows="6"
                                placeholder="Tell us how we can help you..."
                                class="w-full rounded-xl border border-gray-300 px-4 py-3.5
                                       focus:border-blue-500 focus:ring-2 focus:ring-blue-100
                                       outline-none transition resize-none
                                       <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                required
                            ><?php echo e(old('message')); ?></textarea>

                            <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>

                                <p class="text-red-500 text-sm mt-1">
                                    <?php echo e($message); ?>

                                </p>

                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                        </div>


                        
                        <div>

                            <button
                                type="submit"
                                class="w-full inline-flex items-center justify-center gap-2
                                       bg-gray-900 hover:bg-blue-600
                                       text-white font-semibold
                                       px-6 py-3.5 rounded-xl
                                       transition duration-300
                                       focus:outline-none focus:ring-2
                                       focus:ring-gray-900 focus:ring-offset-2"
                            >

                                Send Message

                                <svg class="w-5 h-5"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M14 5l7 7m0 0l-7 7m7-7H3"/>

                                </svg>

                            </button>

                        </div>

                        <p class="text-xs text-gray-500 text-center">
                            By submitting this form, you agree to be contacted regarding your enquiry.
                        </p>

                    </form>

                </div>

            </div>

        </div>

    </div>

</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\company-cms-laravel\company-cms\new\update new\company-cms-updated\resources\views/frontend/contact.blade.php ENDPATH**/ ?>