@extends('admin.layouts.app')

@section('title', 'Edit Post')

@section('page-title', 'Edit Post')

@section('content')

<div class="max-w-4xl">

    <div class="bg-white rounded-lg shadow p-8">

        <form
            action="{{ route('admin.posts.update', $post) }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf
            @method('PUT')


            {{-- Title --}}
            <div class="mb-6">

                <label class="block font-medium mb-2">
                    Title
                </label>

                <input
                    type="text"
                    name="title"
                    value="{{ old('title', $post->title) }}"
                    placeholder="Post Title"
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

                <label class="block font-medium mb-2">
                    Slug
                </label>

                <input
                    type="text"
                    name="slug"
                    value="{{ old('slug', $post->slug) }}"
                    placeholder="post-title"
                    class="w-full border rounded-lg px-4 py-3"
                    required
                >

                @error('slug')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            {{-- Category --}}
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

                    @foreach($categories as $category)

                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}
                        >
                            {{ $category->name }}
                        </option>

                    @endforeach

                </select>

                @error('category_id')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            {{-- Author --}}
            <div class="mb-6">

                <label class="block font-medium mb-2">
                    Author
                </label>

                <input
                    type="text"
                    name="author"
                    value="{{ old('author', $post->author) }}"
                    placeholder="Author name"
                    class="w-full border rounded-lg px-4 py-3"
                >

                @error('author')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            {{-- Featured Image --}}
            <div class="mb-6">

                <label class="block font-medium mb-2">
                    Featured Image
                </label>

                @if($post->featured_image)
                    <div class="mb-3">
                        <img
                            src="{{ Storage::url($post->featured_image) }}"
                            alt="{{ $post->title }}"
                            class="w-40 h-40 object-cover rounded-lg border"
                        >
                        <p class="text-gray-500 text-sm mt-1">
                            Current image. Upload a new one to replace it.
                        </p>
                    </div>
                @endif

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


            {{-- Published At --}}
            <div class="mb-6">

                <label class="block font-medium mb-2">
                    Published At
                </label>

                <input
                    type="datetime-local"
                    name="published_at"
                    value="{{ old('published_at', $post->published_at ? $post->published_at->format('Y-m-d\TH:i') : '') }}"
                    class="w-full border rounded-lg px-4 py-3"
                >

                @error('published_at')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            {{-- Excerpt --}}
            <div class="mb-6">

                <label class="block font-medium mb-2">
                    Excerpt
                </label>

                <textarea
                    name="excerpt"
                    rows="3"
                    class="w-full border rounded-lg px-4 py-3"
                    placeholder="Brief summary of the post"
                >{{ old('excerpt', $post->excerpt) }}</textarea>

                @error('excerpt')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            {{-- Content --}}
            <div class="mb-6">

                <label class="block font-medium mb-2">
                    Content
                </label>

                <textarea
                    name="content"
                    rows="10"
                    class="w-full border rounded-lg px-4 py-3"
                    placeholder="Write your post content here..."
                >{{ old('content', $post->content) }}</textarea>

                @error('content')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            {{-- Status --}}
            <div class="mb-6">

                <label class="block font-medium mb-2">
                    Status
                </label>

                <select
                    name="status"
                    class="w-full border rounded-lg px-4 py-3"
                >

                    <option value="0" {{ old('status', $post->status) == 0 ? 'selected' : '' }}>Draft</option>
                    <option value="1" {{ old('status', $post->status) == 1 ? 'selected' : '' }}>Published</option>

                </select>

                @error('status')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            <div class="flex gap-3">

                <button
                    type="submit"
                    class="bg-gray-900 text-white px-6 py-3 rounded-lg"
                >
                    Update Post
                </button>

                <a
                    href="{{ route('admin.posts.index') }}"
                    class="bg-gray-200 px-6 py-3 rounded-lg hover:bg-gray-300"
                >
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>

@endsection
