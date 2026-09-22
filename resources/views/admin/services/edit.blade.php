@extends('admin.layouts.app')

@section('title', 'Edit Service')

@section('page-title', 'Edit Service')

@section('content')

<div class="max-w-4xl">

    <div class="bg-white rounded-lg shadow p-8">

        <form
            action="{{ route('admin.services.update', $service) }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf

            @method('PUT')


            <div class="mb-6">

                <label class="block font-medium text-gray-700 mb-2">
                    Service Title
                </label>

                <input
                    type="text"
                    name="title"
                    value="{{ old('title', $service->title) }}"
                    class="w-full border rounded-lg px-4 py-3"
                    required
                >

                @error('title')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            <div class="mb-6">

                <label class="block font-medium text-gray-700 mb-2">
                    Slug
                </label>

                <input
                    type="text"
                    name="slug"
                    value="{{ old('slug', $service->slug) }}"
                    class="w-full border rounded-lg px-4 py-3"
                    required
                >

            </div>


            <div class="mb-6">

                <label class="block font-medium text-gray-700 mb-2">
                    Icon
                </label>

                <input
                    type="text"
                    name="icon"
                    value="{{ old('icon', $service->icon) }}"
                    class="w-full border rounded-lg px-4 py-3"
                >

            </div>


            {{-- Image --}}
            <div class="mb-6">

                <label class="block font-medium text-gray-700 mb-2">
                    Image
                </label>

                @if($service->image)
                    <div class="mb-3">
                        <img
                            src="{{ Storage::url($service->image) }}"
                            alt="{{ $service->title }}"
                            class="w-40 h-40 object-cover rounded-lg border"
                        >
                        <p class="text-gray-500 text-sm mt-1">
                            Current image. Upload a new one to replace it.
                        </p>
                    </div>
                @endif

                <input
                    type="file"
                    name="image"
                    accept="image/*"
                    class="w-full border rounded-lg px-4 py-3"
                >

                <p class="text-gray-500 text-sm mt-1">
                    Accepted formats: JPG, PNG, GIF, WEBP (max 2MB).
                </p>

                @error('image')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror

            </div>




            <div class="mb-6">

                <label class="block font-medium text-gray-700 mb-2">
                    Short Description
                </label>

                <textarea
                    name="short_description"
                    rows="4"
                    class="w-full border rounded-lg px-4 py-3"
                >{{ old('short_description', $service->short_description) }}</textarea>

            </div>


            <div class="mb-6">

                <label class="block font-medium text-gray-700 mb-2">
                    Description
                </label>

                <textarea
                    name="description"
                    rows="10"
                    class="w-full border rounded-lg px-4 py-3"
                >{{ old('description', $service->description) }}</textarea>

            </div>


            <div class="mb-6">

                <label class="block font-medium text-gray-700 mb-2">
                    Display Order
                </label>

                <input
                    type="number"
                    name="display_order"
                    value="{{ old('display_order', $service->display_order) }}"
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

                    <option value="1"
                        {{ $service->status ? 'selected' : '' }}>
                        Active
                    </option>

                    <option value="0"
                        {{ !$service->status ? 'selected' : '' }}>
                        Draft
                    </option>

                </select>

            </div>


            <div class="flex gap-3">

                <button
                    type="submit"
                    class="bg-gray-900 text-white px-6 py-3 rounded-lg"
                >
                    Update Service
                </button>

                <a
                    href="{{ route('admin.services.index') }}"
                    class="bg-gray-200 px-6 py-3 rounded-lg"
                >
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>

@endsection
