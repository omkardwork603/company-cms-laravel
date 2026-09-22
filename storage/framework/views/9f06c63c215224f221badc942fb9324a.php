<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('page-title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>

<div class="space-y-8">





    
    

    

        
        

        
        

    






<div>

    <div class="mb-5 flex items-center justify-between">

        <div>

            <p class="text-xs font-bold uppercase tracking-[0.2em] text-blue-600">
                Overview
            </p>

            <h2 class="mt-1 text-xl font-black text-slate-900">
                Website Statistics
            </h2>

        </div>

    </div>


    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-4">


        
        <div class="group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-sm font-medium text-slate-500">
                        Pages
                    </p>

                    <h2 class="mt-3 text-3xl font-black text-slate-900">
                        <?php echo e($stats['pages']); ?>

                    </h2>

                </div>

                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-50 text-xl text-blue-600">
                    ▣
                </div>

            </div>

            <div class="mt-5 h-1.5 overflow-hidden rounded-full bg-slate-100">

                <div class="h-full w-3/4 rounded-full bg-blue-600"></div>

            </div>

            <p class="mt-3 text-xs font-medium text-slate-400">
                Website content
            </p>

        </div>



        
        <div class="group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-sm font-medium text-slate-500">
                        Services
                    </p>

                    <h2 class="mt-3 text-3xl font-black text-slate-900">
                        <?php echo e($stats['services']); ?>

                    </h2>

                </div>

                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-indigo-50 text-xl text-indigo-600">
                    ◇
                </div>

            </div>

            <div class="mt-5 h-1.5 overflow-hidden rounded-full bg-slate-100">

                <div class="h-full w-3/4 rounded-full bg-indigo-600"></div>

            </div>

            <p class="mt-3 text-xs font-medium text-slate-400">
                Available services
            </p>

        </div>



        
        <div class="group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-sm font-medium text-slate-500">
                        Products
                    </p>

                    <h2 class="mt-3 text-3xl font-black text-slate-900">
                        <?php echo e($stats['products']); ?>

                    </h2>

                </div>

                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-cyan-50 text-xl text-cyan-600">
                    □
                </div>

            </div>

            <div class="mt-5 h-1.5 overflow-hidden rounded-full bg-slate-100">

                <div class="h-full w-3/4 rounded-full bg-cyan-500"></div>

            </div>

            <p class="mt-3 text-xs font-medium text-slate-400">
                Company products
            </p>

        </div>



        
        <div class="group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-sm font-medium text-slate-500">
                        Projects
                    </p>

                    <h2 class="mt-3 text-3xl font-black text-slate-900">
                        <?php echo e($stats['projects']); ?>

                    </h2>

                </div>

                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-slate-100 text-xl text-slate-700">
                    ◈
                </div>

            </div>

            <div class="mt-5 h-1.5 overflow-hidden rounded-full bg-slate-100">

                <div class="h-full w-3/4 rounded-full bg-slate-900"></div>

            </div>

            <p class="mt-3 text-xs font-medium text-slate-400">
                Completed projects
            </p>

        </div>

    </div>

</div>




<div class="rounded-3xl border border-slate-200 bg-white p-7 shadow-sm">

    <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-center">

        <div>

            <p class="text-xs font-bold uppercase tracking-[0.2em] text-blue-600">
                Quick Actions
            </p>

            <h2 class="mt-1 text-xl font-black text-slate-900">
                Manage your content
            </h2>

            <p class="mt-1 text-sm text-slate-500">
                Quickly create new website content.
            </p>

        </div>

    </div>


    <div class="mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">


        
        <a href="<?php echo e(route('admin.pages.create')); ?>"
           class="group flex items-center justify-between rounded-2xl border border-slate-200 p-5 transition hover:border-blue-200 hover:bg-blue-50">

            <div class="flex items-center gap-4">

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-blue-600 text-lg font-bold text-white">
                    +
                </div>

                <div>

                    <p class="font-bold text-slate-900">
                        Add Page
                    </p>

                    <p class="mt-1 text-xs text-slate-500">
                        Create website page
                    </p>

                </div>

            </div>

            <span class="text-xl text-slate-300 transition group-hover:translate-x-1 group-hover:text-blue-600">
                →
            </span>

        </a>



        
        <a href="<?php echo e(route('admin.services.create')); ?>"
           class="group flex items-center justify-between rounded-2xl border border-slate-200 p-5 transition hover:border-indigo-200 hover:bg-indigo-50">

            <div class="flex items-center gap-4">

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-indigo-600 text-lg font-bold text-white">
                    +
                </div>

                <div>

                    <p class="font-bold text-slate-900">
                        Add Service
                    </p>

                    <p class="mt-1 text-xs text-slate-500">
                        Create new service
                    </p>

                </div>

            </div>

            <span class="text-xl text-slate-300 transition group-hover:translate-x-1 group-hover:text-indigo-600">
                →
            </span>

        </a>



        
        <a href="<?php echo e(route('admin.products.create')); ?>"
           class="group flex items-center justify-between rounded-2xl border border-slate-200 p-5 transition hover:border-cyan-200 hover:bg-cyan-50">

            <div class="flex items-center gap-4">

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-cyan-600 text-lg font-bold text-white">
                    +
                </div>

                <div>

                    <p class="font-bold text-slate-900">
                        Add Product
                    </p>

                    <p class="mt-1 text-xs text-slate-500">
                        Create new product
                    </p>

                </div>

            </div>

            <span class="text-xl text-slate-300 transition group-hover:translate-x-1 group-hover:text-cyan-600">
                →
            </span>

        </a>

    </div>

</div>




<div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

    <div class="flex items-center justify-between border-b border-slate-200 px-7 py-6">

        <div>

            <p class="text-xs font-bold uppercase tracking-[0.2em] text-blue-600">
                Activity
            </p>

            <h2 class="mt-1 text-xl font-black text-slate-900">
                Recent Activity
            </h2>

        </div>

        <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-500">
            Latest
        </span>

    </div>


    <div class="px-7 py-10">

        <div class="flex flex-col items-center justify-center text-center">

            <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-slate-100 text-2xl text-slate-400">
                ◷
            </div>

            <h3 class="mt-5 font-bold text-slate-800">
                No recent activity
            </h3>

            <p class="mt-2 max-w-md text-sm leading-6 text-slate-500">
                Your latest content updates, changes and
                administrative activities will appear here.
            </p>

        </div>

    </div>

</div>


</div>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\company-cms-laravel-ne\company-cms\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>