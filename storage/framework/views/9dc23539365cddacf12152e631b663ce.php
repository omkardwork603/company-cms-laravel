<?php $__env->startSection('title', 'Edit Team Member'); ?>

<?php $__env->startSection('page-title', 'Edit Team Member'); ?>

<?php $__env->startSection('content'); ?>

<div class="max-w-4xl">

    <div class="bg-white rounded-lg shadow p-8">

        <form
            action="<?php echo e(route('admin.team.update', $team)); ?>"
            method="POST"
        >

            <?php echo csrf_field(); ?>

            <?php echo method_field('PUT'); ?>


            
            <div class="mb-6">

                <label class="block font-medium text-gray-700 mb-2">
                    Name
                </label>

                <input
                    type="text"
                    name="name"
                    value="<?php echo e(old('name', $team->name)); ?>"
                    placeholder="John Doe"
                    class="w-full border rounded-lg px-4 py-3"
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


            
            <div class="mb-6">

                <label class="block font-medium text-gray-700 mb-2">
                    Slug
                </label>

                <input
                    type="text"
                    name="slug"
                    value="<?php echo e(old('slug', $team->slug)); ?>"
                    placeholder="john-doe"
                    class="w-full border rounded-lg px-4 py-3"
                >

                <p class="text-gray-500 text-sm mt-1">
                    Leave empty to generate automatically.
                </p>

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
                    Designation
                </label>

                <input
                    type="text"
                    name="designation"
                    value="<?php echo e(old('designation', $team->designation)); ?>"
                    placeholder="Managing Director"
                    class="w-full border rounded-lg px-4 py-3"
                >

            </div>


            
            <div class="mb-6">

                <label class="block font-medium text-gray-700 mb-2">
                    Department
                </label>

                <input
                    type="text"
                    name="department"
                    value="<?php echo e(old('department', $team->department)); ?>"
                    placeholder="Management"
                    class="w-full border rounded-lg px-4 py-3"
                >

            </div>


            
            <div class="mb-6">

                <label class="block font-medium text-gray-700 mb-2">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    value="<?php echo e(old('email', $team->email)); ?>"
                    placeholder="john@example.com"
                    class="w-full border rounded-lg px-4 py-3"
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


            
            <div class="mb-6">

                <label class="block font-medium text-gray-700 mb-2">
                    Phone
                </label>

                <input
                    type="text"
                    name="phone"
                    value="<?php echo e(old('phone', $team->phone)); ?>"
                    placeholder="+91 9876543210"
                    class="w-full border rounded-lg px-4 py-3"
                >

            </div>


            
            <div class="mb-6">

                <label class="block font-medium text-gray-700 mb-2">
                    Bio
                </label>

                <textarea
                    name="bio"
                    rows="6"
                    class="w-full border rounded-lg px-4 py-3"
                    placeholder="Team member biography..."
                ><?php echo e(old('bio', $team->bio)); ?></textarea>

            </div>


            
            <div class="mb-6">

                <label class="block font-medium text-gray-700 mb-2">
                    Profile Image
                </label>

                <input
                    type="text"
                    name="profile_image"
                    value="<?php echo e(old('profile_image', $team->profile_image)); ?>"
                    placeholder="team/john-doe.jpg"
                    class="w-full border rounded-lg px-4 py-3"
                >

            </div>


            
            <div class="mb-6">

                <label class="block font-medium text-gray-700 mb-2">
                    LinkedIn URL
                </label>

                <input
                    type="url"
                    name="linkedin_url"
                    value="<?php echo e(old('linkedin_url', $team->linkedin_url)); ?>"
                    placeholder="https://linkedin.com/in/john-doe"
                    class="w-full border rounded-lg px-4 py-3"
                >

            </div>


            
            <div class="mb-6">

                <label class="block font-medium text-gray-700 mb-2">
                    Twitter / X URL
                </label>

                <input
                    type="url"
                    name="twitter_url"
                    value="<?php echo e(old('twitter_url', $team->twitter_url)); ?>"
                    placeholder="https://x.com/johndoe"
                    class="w-full border rounded-lg px-4 py-3"
                >

            </div>


            
            <div class="mb-6">

                <label class="block font-medium text-gray-700 mb-2">
                    Facebook URL
                </label>

                <input
                    type="url"
                    name="facebook_url"
                    value="<?php echo e(old('facebook_url', $team->facebook_url)); ?>"
                    placeholder="https://facebook.com/johndoe"
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
                    value="<?php echo e(old('display_order', $team->display_order)); ?>"
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

                    <option value="1" <?php echo e(old('status', $team->status) == 1 ? 'selected' : ''); ?>>
                        Active
                    </option>

                    <option value="0" <?php echo e(old('status', $team->status) == 0 ? 'selected' : ''); ?>>
                        Draft
                    </option>

                </select>

            </div>


            
            <div class="flex gap-3">

                <button
                    type="submit"
                    class="bg-gray-900 text-white px-6 py-3 rounded-lg"
                >
                    Update Team Member
                </button>

                <a
                    href="<?php echo e(route('admin.team.index')); ?>"
                    class="bg-gray-200 px-6 py-3 rounded-lg"
                >
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\company-cms-laravel\company-cms\new\update new\company-cms-updated\resources\views/admin/team/edit.blade.php ENDPATH**/ ?>