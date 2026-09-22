<?php $__env->startSection('title', 'Edit Project'); ?>

<?php $__env->startSection('page-title', 'Edit Project'); ?>

<?php $__env->startSection('content'); ?>

<div class="max-w-4xl">

    <div class="bg-white rounded-lg shadow p-8">

        <form
            action="<?php echo e(route('admin.projects.update', $project)); ?>"
            method="POST"
            enctype="multipart/form-data"
        >

            <?php echo csrf_field(); ?>

            <?php echo method_field('PUT'); ?>


            
            <div class="mb-6">

                <label class="block font-medium text-gray-700 mb-2">
                    Project Title
                </label>

                <input
                    type="text"
                    name="title"
                    value="<?php echo e(old('title', $project->title)); ?>"
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
                    value="<?php echo e(old('slug', $project->slug)); ?>"
                    class="w-full border rounded-lg px-4 py-3"
                    required
                >

            </div>


            
            <div class="mb-6">

                <label class="block font-medium text-gray-700 mb-2">
                    Client Name
                </label>

                <input
                    type="text"
                    name="client_name"
                    value="<?php echo e(old('client_name', $project->client_name)); ?>"
                    class="w-full border rounded-lg px-4 py-3"
                >

            </div>


            
            <div class="mb-6">

                <label class="block font-medium text-gray-700 mb-2">
                    Category
                </label>

                <input
                    type="text"
                    name="category"
                    value="<?php echo e(old('category', $project->category)); ?>"
                    class="w-full border rounded-lg px-4 py-3"
                >

            </div>


            
            <div class="mb-6">

                <label class="block font-medium text-gray-700 mb-2">
                    Short Description
                </label>

                <textarea
                    name="short_description"
                    rows="4"
                    class="w-full border rounded-lg px-4 py-3"
                ><?php echo e(old('short_description', $project->short_description)); ?></textarea>

            </div>


            
            <div class="mb-6">

                <label class="block font-medium text-gray-700 mb-2">
                    Description
                </label>

                <textarea
                    name="description"
                    rows="10"
                    class="w-full border rounded-lg px-4 py-3"
                ><?php echo e(old('description', $project->description)); ?></textarea>

            </div>


            
            <div class="mb-6">

                <label class="block font-medium text-gray-700 mb-2">
                    Featured Image
                </label>

                <?php if($project->featured_image): ?>

                    <div class="mb-3">

                        <img
                            src="<?php echo e(Storage::url($project->featured_image)); ?>"
                            alt="<?php echo e($project->title); ?>"
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

                <label class="block font-medium text-gray-700 mb-2">
                    Project URL
                </label>

                <input
                    type="url"
                    name="project_url"
                    value="<?php echo e(old('project_url', $project->project_url)); ?>"
                    class="w-full border rounded-lg px-4 py-3"
                >

            </div>


            
            <div class="mb-6">

                <label class="block font-medium text-gray-700 mb-2">
                    Display Order
                </label>

                <input
                    type="number"
                    name="display_order"
                    value="<?php echo e(old('display_order', $project->display_order)); ?>"
                    min="0"
                    class="w-full border rounded-lg px-4 py-3"
                >

            </div>


            
            <div class="mb-6">

                <label class="block font-medium text-gray-700 mb-2">
                    Status
                </label>

                <select
                    name="status"
                    class="w-full border rounded-lg px-4 py-3"
                >

                    <option value="1" <?php echo e(old('status', $project->status) ? 'selected' : ''); ?>>
                        Active
                    </option>

                    <option value="0" <?php echo e(!old('status', $project->status) ? 'selected' : ''); ?>>
                        Draft
                    </option>

                </select>

            </div>


            
            <div class="flex gap-3">

                <button
                    type="submit"
                    class="bg-gray-900 text-white px-6 py-3 rounded-lg"
                >
                    Update Project
                </button>

                <a
                    href="<?php echo e(route('admin.projects.index')); ?>"
                    class="bg-gray-200 px-6 py-3 rounded-lg"
                >
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\company-cms-laravel\company-cms\new\update new\company-cms-updated\resources\views/admin/projects/edit.blade.php ENDPATH**/ ?>