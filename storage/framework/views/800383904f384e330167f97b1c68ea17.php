

<?php $__env->startSection('title', 'Edit Page'); ?>

<?php $__env->startSection('page-title', 'Edit Page'); ?>

<?php $__env->startSection('content'); ?>

<div class="max-w-4xl">

    <div class="bg-white rounded-lg shadow p-8">

        <form
            action="<?php echo e(route('admin.pages.update', $page)); ?>"
            method="POST"
        >

            <?php echo csrf_field(); ?>

            <?php echo method_field('PUT'); ?>


            
            <div class="mb-6">

                <label class="block font-medium text-gray-700 mb-2">
                    Page Title
                </label>

                <input
                    type="text"
                    name="title"
                    value="<?php echo e(old('title', $page->title)); ?>"
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

                <label class="block font-medium text-gray-700 mb-2">
                    Slug
                </label>

                <input
                    type="text"
                    name="slug"
                    value="<?php echo e(old('slug', $page->slug)); ?>"
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

                <label class="block font-medium text-gray-700 mb-2">
                    Content
                </label>

                <textarea
                    name="content"
                    rows="10"
                    class="w-full border rounded-lg px-4 py-3"
                ><?php echo e(old('content', $page->content)); ?></textarea>

            </div>


            
            <div class="mb-6">

                <label class="block font-medium text-gray-700 mb-2">
                    Status
                </label>

                <select
                    name="status"
                    class="w-full border rounded-lg px-4 py-3"
                >

                    <option value="1"
                        <?php echo e($page->status ? 'selected' : ''); ?>>
                        Active
                    </option>

                    <option value="0"
                        <?php echo e(!$page->status ? 'selected' : ''); ?>>
                        Draft
                    </option>

                </select>

            </div>


            <div class="flex gap-3">

                <button
                    type="submit"
                    class="bg-gray-900 text-white px-6 py-3 rounded-lg"
                >
                    Update Page
                </button>

                <a
                    href="<?php echo e(route('admin.pages.index')); ?>"
                    class="bg-gray-200 px-6 py-3 rounded-lg"
                >
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\company-cms-laravel\company-cms\new\update new\company-cms-updated\resources\views/admin/pages/edit.blade.php ENDPATH**/ ?>