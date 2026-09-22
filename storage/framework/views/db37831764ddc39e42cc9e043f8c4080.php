<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        <?php echo $__env->yieldContent('title', $settings?->company_name ?? 'Company Website'); ?>
    </title>

    <?php if($settings?->favicon): ?>

        <link
            rel="icon"
            href="<?php echo e(asset('storage/' . $settings->favicon)); ?>"
        >

    <?php endif; ?>

    <?php echo app('Illuminate\Foundation\Vite')([
        'resources/css/app.css',
        'resources/js/app.js'
    ]); ?>

</head>

<body class="bg-white text-gray-900">

    <?php echo $__env->make('frontend.layouts.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>


    <main>

        <?php echo $__env->yieldContent('content'); ?>

    </main>


    <?php echo $__env->make('frontend.layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

</body>

</html><?php /**PATH C:\wamp64\www\company-cms-laravel-ne\company-cms\resources\views/frontend/layouts/app.blade.php ENDPATH**/ ?>