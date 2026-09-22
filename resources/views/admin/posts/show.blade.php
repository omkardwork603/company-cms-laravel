@extends('admin.layouts.app')

@section('title', $post->title)

@section('page-title', $post->title)

@section('content')

<div class="max-w-4xl">

    <div class="bg-white rounded-lg shadow p-8">

        {{-- Action Buttons --}}
        <div class="flex justify-between items-center mb-8 border-b pb-4">

            <a
                href="{{ route('admin.posts.index') }}"
                class="text-blue-600 hover:underline"
            >
                ← Back to Posts
            </a>

            <div class="flex gap-3">

                <a
                    href="{{ route('admin.posts.edit', $post) }}"
                    class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 text-sm font-medium"
                >
                    Edit Post
                </a>

                <form
                    action="{{ route('admin.posts.destroy', $post) }}"
                    method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this post?')"
                >

                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 text-sm font-medium"
                    >
                        Delete
                    </button>

                </form>

            </div>

        </div>


        {{-- Post details --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <div class="md:col-span-2">

                <h1 class="text-3xl font-bold text-gray-900 mb-4">
                    {{ $post->title }}
                </h1>

                @if($post->featured_image)
                    <div class="mb-6">
                        <img
                            src="{{ Storage::url($post->featured_image) }}"
                            alt="{{ $post->title }}"
                            class="w-full max-w-lg rounded-lg border object-cover"
                        >
                    </div>
                @endif

                @if($post->excerpt)
                    <div class="text-gray-600 italic mb-6 text-lg border-l-4 border-gray-200 pl-4">
                        {{ $post->excerpt }}
                    </div>
                @endif

                <div class="prose max-w-none text-gray-800">
                    {!! nl2br(e($post->content)) !!}
                </div>

            </div>


            {{-- Metadata Sidebar --}}
            <div class="bg-gray-50 rounded-lg p-6 h-fit border">

                <h3 class="text-lg font-bold text-gray-800 border-b pb-2 mb-4">
                    Details
                </h3>

                <div class="space-y-4 text-sm">

                    <div>
                        <span class="block text-gray-500 font-medium">Status</span>
                        @if($post->status)
                            <span class="px-2 py-0.5 text-xs bg-green-100 text-green-700 rounded-full font-semibold">
                                Published
                            </span>
                        @else
                            <span class="px-2 py-0.5 text-xs bg-gray-100 text-gray-600 rounded-full font-semibold">
                                Draft
                            </span>
                        @endif
                    </div>

                    <div>
                        <span class="block text-gray-500 font-medium">Category</span>
                        <span class="text-gray-900 font-semibold">
                            {{ $post->category ? $post->category->name : 'Uncategorized' }}
                        </span>
                    </div>

                    <div>
                        <span class="block text-gray-500 font-medium">Author</span>
                        <span class="text-gray-900 font-semibold">
                            {{ $post->author ?? 'Admin' }}
                        </span>
                    </div>

                    <div>
                        <span class="block text-gray-500 font-medium">Published At</span>
                        <span class="text-gray-900">
                            {{ $post->published_at ? $post->published_at->format('Y-m-d H:i') : '-' }}
                        </span>
                    </div>

                    @if($post->featured_image)
                        <div>
                            <span class="block text-gray-500 font-medium mb-1">Featured Image</span>
                            <span class="text-gray-600 block break-all text-xs mb-2">
                                {{ $post->featured_image }}
                            </span>
                            <div class="border rounded overflow-hidden">
                                <img
                                    src="{{ asset('storage/' . $post->featured_image) }}"
                                    alt="Preview"
                                    class="w-full h-auto object-cover max-h-40"
                                    onerror="this.style.display='none';"
                                >
                            </div>
                        </div>
                    @endif

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
