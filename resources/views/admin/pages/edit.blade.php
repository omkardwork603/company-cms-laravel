@extends('admin.layouts.app')

@section('title', 'Edit Page')

@section('page-title', 'Edit Page')

@section('content')

<div class="max-w-4xl">

    <div class="bg-white rounded-lg shadow p-8">

        <form
            action="{{ route('admin.pages.update', $page) }}"
            method="POST"
        >

            @csrf

            @method('PUT')


            {{-- Title --}}
            <div class="mb-6">

                <label class="block font-medium text-gray-700 mb-2">
                    Page Title
                </label>

                <input
                    type="text"
                    name="title"
                    value="{{ old('title', $page->title) }}"
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
                    value="{{ old('slug', $page->slug) }}"
                    class="w-full border rounded-lg px-4 py-3"
                    required
                >

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
                    class="w-full border rounded-lg px-4 py-3"
                >{{ old('content', $page->content) }}</textarea>

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
                        {{ $page->status ? 'selected' : '' }}>
                        Active
                    </option>

                    <option value="0"
                        {{ !$page->status ? 'selected' : '' }}>
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
                    href="{{ route('admin.pages.index') }}"
                    class="bg-gray-200 px-6 py-3 rounded-lg"
                >
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>

@endsection