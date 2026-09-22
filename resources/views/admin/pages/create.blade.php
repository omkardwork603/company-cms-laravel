@extends('admin.layouts.app')

@section('title', 'Add Page')

@section('page-title', 'Add Page')

@section('content')

<div class="max-w-4xl">

    <div class="bg-white rounded-lg shadow p-8">

        <form
            action="{{ route('admin.pages.store') }}"
            method="POST"
        >

            @csrf


            {{-- Title --}}
            <div class="mb-6">

                <label class="block font-medium text-gray-700 mb-2">
                    Page Title
                </label>

                <input
                    type="text"
                    name="title"
                    value="{{ old('title') }}"
                    placeholder="Enter page title"
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
                    placeholder="about-us"
                    class="w-full border rounded-lg px-4 py-3"
                >

                <p class="text-gray-500 text-sm mt-1">
                    Leave empty to generate automatically.
                </p>

                @error('slug')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            {{-- Content --}}
            <div class="mb-6">

                <label class="block font-medium text-gray-700 mb-2">
                    Content
                </label>

                <textarea
                    name="content"
                    rows="10"
                    placeholder="Enter page content..."
                    class="w-full border rounded-lg px-4 py-3"
                >{{ old('content') }}</textarea>

                @error('content')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror

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

                    <option value="1"
                        {{ old('status', '1') == '1' ? 'selected' : '' }}>
                        Active
                    </option>

                    <option value="0"
                        {{ old('status') === '0' ? 'selected' : '' }}>
                        Draft
                    </option>

                </select>

            </div>


            {{-- Buttons --}}
            <div class="flex gap-3">

                <button
                    type="submit"
                    class="bg-gray-900 text-white px-6 py-3 rounded-lg hover:bg-gray-800"
                >
                    Create Page
                </button>

                <a
                    href="{{ route('admin.pages.index') }}"
                    class="bg-gray-200 px-6 py-3 rounded-lg hover:bg-gray-300"
                >
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>

@endsection