<?php $__env->startSection('title', 'Edit Post'); ?>

<?php $__env->startSection('page-title', 'Edit Post'); ?>

<?php $__env->startSection('content'); ?>

<div class="max-w-4xl">

    <div class="bg-white rounded-lg shadow p-8">

        <form
            action="<?php echo e(route('admin.posts.update', $post)); ?>"
            method="POST"
            enctype="multipart/form-data"
        >

            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>


            
            <div class="mb-6">

                <label class="block font-medium mb-2">
                    Title
                </label>

                <input
                    type="text"
                    name="title"
                    value="<?php echo e(old('title', $post->title)); ?>"
                    placeholder="Post Title"
                    class="w-full border rounded-lg px-4 py-3"
                    required
                >

                <?php $__errorArgs = ['title'];
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


            
            <div class="mb-6">

                <label class="block font-medium mb-2">
                    Slug
                </label>

                <input
                    type="text"
                    name="slug"
                    value="<?php echo e(old('slug', $post->slug)); ?>"
                    placeholder="post-title"
                    class="w-full border rounded-lg px-4 py-3"
                    required
                >

                <?php $__errorArgs = ['slug'];
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


            
            <div class="mb-6">

                <label class="block font-medium mb-2">
                    Category
                </label>

                <select
                    name="category_id"
                    class="w-full border rounded-lg px-4 py-3"
                >

                    <option value="">
                        Select Category
                    </option>

                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <option
                            value="<?php echo e($category->id); ?>"
                            <?php echo e(old('category_id', $post->category_id) == $category->id ? 'selected' : ''); ?>

                        >
                            <?php echo e($category->name); ?>

                        </option>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </select>

                <?php $__errorArgs = ['category_id'];
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


            
            <div class="mb-6">

                <label class="block font-medium mb-2">
                    Author
                </label>

                <input
                    type="text"
                    name="author"
                    value="<?php echo e(old('author', $post->author)); ?>"
                    placeholder="Author name"
                    class="w-full border rounded-lg px-4 py-3"
                >

                <?php $__errorArgs = ['author'];
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


            
            <div class="mb-6">

                <label class="block font-medium mb-2">
                    Featured Image
                </label>

                <?php if($post->featured_image): ?>
                    <div class="mb-3">
                        <img
                            src="<?php echo e(Storage::url($post->featured_image)); ?>"
                            alt="<?php echo e($post->title); ?>"
                            class="w-40 h-40 object-cover rounded-lg border"
                        >
                        <p class="text-gray-500 text-sm mt-1">
                            Current image. Upload a new one to replace it.
                        </p>
                    </div>
                <?php endif; ?>

                <input
                    type="file"
                    name="featured_image"
                    accept="image/*"
                    class="w-full border rounded-lg px-4 py-3"
                >

                <p class="text-gray-500 text-sm mt-1">
                    Accepted formats: JPG, PNG, GIF, WEBP (max 2MB).
                </p>

                <?php $__errorArgs = ['featured_image'];
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


            
            <div class="mb-6">

                <label class="block font-medium mb-2">
                    Published At
                </label>

                <input
                    type="datetime-local"
                    name="published_at"
                    value="<?php echo e(old('published_at', $post->published_at ? $post->published_at->format('Y-m-d\TH:i') : '')); ?>"
                    class="w-full border rounded-lg px-4 py-3"
                >

                <?php $__errorArgs = ['published_at'];
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


            
            <div class="mb-6">

                <label class="block font-medium mb-2">
                    Excerpt
                </label>

                <textarea
                    name="excerpt"
                    rows="3"
                    class="w-full border rounded-lg px-4 py-3"
                    placeholder="Brief summary of the post"
                ><?php echo e(old('excerpt', $post->excerpt)); ?></textarea>

                <?php $__errorArgs = ['excerpt'];
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


            
            <div class="mb-6">

                <label class="block font-medium mb-2">
                    Content
                </label>

                <textarea
                    name="content"
                    rows="10"
                    class="w-full border rounded-lg px-4 py-3"
                    placeholder="Write your post content here..."
                ><?php echo e(old('content', $post->content)); ?></textarea>

                <?php $__errorArgs = ['content'];
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


            
            <div class="mb-6">

                <label class="block font-medium mb-2">
                    Status
                </label>

                <select
                    name="status"
                    class="w-full border rounded-lg px-4 py-3"
                >

                    <option value="0" <?php echo e(old('status', $post->status) == 0 ? 'selected' : ''); ?>>Draft</option>
                    <option value="1" <?php echo e(old('status', $post->status) == 1 ? 'selected' : ''); ?>>Published</option>

                </select>

                <?php $__errorArgs = ['status'];
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


            <div class="flex gap-3">

                <button
                    type="submit"
                    class="bg-gray-900 text-white px-6 py-3 rounded-lg"
                >
                    Update Post
                </button>

                <a
                    href="<?php echo e(route('admin.posts.index')); ?>"
                    class="bg-gray-200 px-6 py-3 rounded-lg hover:bg-gray-300"
                >
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\company-cms-laravel\company-cms\new\update new\company-cms-updated\resources\views/admin/posts/edit.blade.php ENDPATH**/ ?>