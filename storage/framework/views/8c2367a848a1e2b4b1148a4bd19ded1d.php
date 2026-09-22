<?php $__env->startSection('title', $post->title); ?>

<?php $__env->startSection('page-title', $post->title); ?>

<?php $__env->startSection('content'); ?>

<div class="max-w-4xl">

    <div class="bg-white rounded-lg shadow p-8">

        
        <div class="flex justify-between items-center mb-8 border-b pb-4">

            <a
                href="<?php echo e(route('admin.posts.index')); ?>"
                class="text-blue-600 hover:underline"
            >
                ← Back to Posts
            </a>

            <div class="flex gap-3">

                <a
                    href="<?php echo e(route('admin.posts.edit', $post)); ?>"
                    class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 text-sm font-medium"
                >
                    Edit Post
                </a>

                <form
                    action="<?php echo e(route('admin.posts.destroy', $post)); ?>"
                    method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this post?')"
                >

                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>

                    <button
                        type="submit"
                        class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 text-sm font-medium"
                    >
                        Delete
                    </button>

                </form>

            </div>

        </div>


        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <div class="md:col-span-2">

                <h1 class="text-3xl font-bold text-gray-900 mb-4">
                    <?php echo e($post->title); ?>

                </h1>

                <?php if($post->featured_image): ?>
                    <div class="mb-6">
                        <img
                            src="<?php echo e(Storage::url($post->featured_image)); ?>"
                            alt="<?php echo e($post->title); ?>"
                            class="w-full max-w-lg rounded-lg border object-cover"
                        >
                    </div>
                <?php endif; ?>

                <?php if($post->excerpt): ?>
                    <div class="text-gray-600 italic mb-6 text-lg border-l-4 border-gray-200 pl-4">
                        <?php echo e($post->excerpt); ?>

                    </div>
                <?php endif; ?>

                <div class="prose max-w-none text-gray-800">
                    <?php echo nl2br(e($post->content)); ?>

                </div>

            </div>


            
            <div class="bg-gray-50 rounded-lg p-6 h-fit border">

                <h3 class="text-lg font-bold text-gray-800 border-b pb-2 mb-4">
                    Details
                </h3>

                <div class="space-y-4 text-sm">

                    <div>
                        <span class="block text-gray-500 font-medium">Status</span>
                        <?php if($post->status): ?>
                            <span class="px-2 py-0.5 text-xs bg-green-100 text-green-700 rounded-full font-semibold">
                                Published
                            </span>
                        <?php else: ?>
                            <span class="px-2 py-0.5 text-xs bg-gray-100 text-gray-600 rounded-full font-semibold">
                                Draft
                            </span>
                        <?php endif; ?>
                    </div>

                    <div>
                        <span class="block text-gray-500 font-medium">Category</span>
                        <span class="text-gray-900 font-semibold">
                            <?php echo e($post->category ? $post->category->name : 'Uncategorized'); ?>

                        </span>
                    </div>

                    <div>
                        <span class="block text-gray-500 font-medium">Author</span>
                        <span class="text-gray-900 font-semibold">
                            <?php echo e($post->author ?? 'Admin'); ?>

                        </span>
                    </div>

                    <div>
                        <span class="block text-gray-500 font-medium">Published At</span>
                        <span class="text-gray-900">
                            <?php echo e($post->published_at ? $post->published_at->format('Y-m-d H:i') : '-'); ?>

                        </span>
                    </div>

                    <?php if($post->featured_image): ?>
                        <div>
                            <span class="block text-gray-500 font-medium mb-1">Featured Image</span>
                            <span class="text-gray-600 block break-all text-xs mb-2">
                                <?php echo e($post->featured_image); ?>

                            </span>
                            <div class="border rounded overflow-hidden">
                                <img
                                    src="<?php echo e(asset('storage/' . $post->featured_image)); ?>"
                                    alt="Preview"
                                    class="w-full h-auto object-cover max-h-40"
                                    onerror="this.style.display='none';"
                                >
                            </div>
                        </div>
                    <?php endif; ?>

                </div>

            </div>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\company-cms-laravel\company-cms\new\update new\company-cms-updated\resources\views/admin/posts/show.blade.php ENDPATH**/ ?>