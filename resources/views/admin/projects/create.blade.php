@extends('admin.layouts.app')

@section('title', 'Add Project')

@section('page-title', 'Add Project')

@section('content')

<div class="max-w-4xl">

    <div class="bg-white rounded-lg shadow p-8">

        <form
            action="{{ route('admin.projects.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf


            {{-- Title --}}
            <div class="mb-6">

                <label class="block font-medium text-gray-700 mb-2">
                    Project Title
                </label>

                <input
                    type="text"
                    name="title"
                    value="{{ old('title') }}"
                    placeholder="Company Website"
                    class="w-full border rounded-lg px-4 py-3"
                    required
                >

                @error('title')

                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>

                @enderror

            </div>


            {{-- Slug --}}
            <div class="mb-6">

                <label class="block font-medium text-gray-700 mb-2">
                    Slug
                </label>

                <input
                    type="text"
                    name="slug"
                    value="{{ old('slug') }}"
                    placeholder="company-website"
                    class="w-full border rounded-lg px-4 py-3"
                >

                <p class="text-gray-500 text-sm mt-1">
                    Leave empty to generate automatically.
                </p>

            </div>


            {{-- Client --}}
            <div class="mb-6">

                <label class="block font-medium text-gray-700 mb-2">
                    Client Name
                </label>

                <input
                    type="text"
                    name="client_name"
                    value="{{ old('client_name') }}"
                    placeholder="ABC Company"
                    class="w-full border rounded-lg px-4 py-3"
                >

            </div>


            {{-- Category --}}
            <div class="mb-6">

                <label class="block font-medium text-gray-700 mb-2">
                    Category
                </label>

                <input
                    type="text"
                    name="category"
                    value="{{ old('category') }}"
                    placeholder="Web Development"
                    class="w-full border rounded-lg px-4 py-3"
                >

            </div>


            {{-- Short Description --}}
            <div class="mb-6">

                <label class="block font-medium text-gray-700 mb-2">
                    Short Description
                </label>

                <textarea
                    name="short_description"
                    rows="4"
                    class="w-full border rounded-lg px-4 py-3"
                    placeholder="Brief project description..."
                >{{ old('short_description') }}</textarea>

            </div>


            {{-- Description --}}
            <div class="mb-6">

                <label class="block font-medium text-gray-700 mb-2">
                    Description
                </label>

                <textarea
                    name="description"
                    rows="10"
                    class="w-full border rounded-lg px-4 py-3"
                    placeholder="Detailed project description..."
                >{{ old('description') }}</textarea>

            </div>


            {{-- Featured Image --}}
            <div class="mb-6">

                <label class="block font-medium text-gray-700 mb-2">
                    Featured Image
                </label>

                <input
                    type="file"
                    name="featured_image"
                    accept="image/*"
                    class="w-full border rounded-lg px-4 py-3"
                >

                <p class="text-gray-500 text-sm mt-1">
                    Accepted formats: JPG, PNG, GIF, WEBP (max 2MB).
                </p>

                @error('featured_image')

                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>

                @enderror

            </div>


            {{-- Project URL --}}
            <div class="mb-6">

                <label class="block font-medium text-gray-700 mb-2">
                    Project URL
                </label>

                <input
                    type="url"
                    name="project_url"
                    value="{{ old('project_url') }}"
                    placeholder="https://example.com"
                    class="w-full border rounded-lg px-4 py-3"
                >

            </div>


            {{-- Display Order --}}
            <div class="mb-6">

                <label class="block font-medium text-gray-700 mb-2">
                    Display Order
                </label>

                <input
                    type="number"
                    name="display_order"
                    value="{{ old('display_order', 0) }}"
                    min="0"
                    class="w-full border rounded-lg px-4 py-3"
                >

            </div>


            {{-- Status --}}
            <div class="mb-6">

                <label class="block font-medium text-gray-700 mb-2">
                    Status
                </label>

                <select
                    name="status"
                    class="w-full border rounded-lg px-4 py-3"
                >

                    <option value="1">
                        Active
                    </option>

                    <option value="0">
                        Draft
                    </option>

                </select>

            </div>


            {{-- Buttons --}}
            <div class="flex gap-3">

                <button
                    type="submit"
                    class="bg-gray-900 text-white px-6 py-3 rounded-lg"
                >
                    Create Project
                </button>

                <a
                    href="{{ route('admin.projects.index') }}"
                    class="bg-gray-200 px-6 py-3 rounded-lg"
                >
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>

@endsection