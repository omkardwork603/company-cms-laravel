@extends('admin.layouts.app')

@section('title', 'Posts')

@section('page-title', 'Posts')

@section('content')

<div>

    {{-- Header --}}
    <div class="flex justify-between items-center mb-6">

        <div>

            <h1 class="text-2xl font-bold text-gray-800">
                Posts
            </h1>

            <p class="text-gray-500 mt-1">
                Manage your blog posts.
            </p>

        </div>

        <a
            href="{{ route('admin.posts.create') }}"
            class="bg-gray-900 text-white px-5 py-3 rounded-lg hover:bg-gray-800"
        >
            + Add Post
        </a>

    </div>


    {{-- Success Message --}}
    @if(session('success'))

        <div class="bg-green-100 text-green-700 px-4 py-3 rounded-lg mb-6">

            {{ session('success') }}

        </div>

    @endif


    {{-- Validation Errors --}}
    @if($errors->any())

        <div class="bg-red-100 text-red-700 px-4 py-3 rounded-lg mb-6">

            <ul class="list-disc ml-5">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- Table --}}
    <div class="bg-white rounded-lg shadow overflow-hidden">

        <table class="w-full">

            <thead class="bg-gray-50 border-b">

                <tr>

                    <th class="text-left px-6 py-4">
                        #
                    </th>

                    <th class="text-left px-6 py-4">
                        Title
                    </th>

                    <th class="text-left px-6 py-4">
                        Image
                    </th>

                    <th class="text-left px-6 py-4">
                        Category
                    </th>

                    <th class="text-left px-6 py-4">
                        Published At
                    </th>

                    <th class="text-left px-6 py-4">
                        Status
                    </th>

                    <th class="text-right px-6 py-4">
                        Actions
                    </th>

                </tr>

            </thead>


            <tbody>

                @forelse($posts as $post)

                    <tr class="border-b">

                        <td class="px-6 py-4">
                            {{ $post->id }}
                        </td>

                        <td class="px-6 py-4 font-medium text-gray-900">
                            {{ $post->title }}
                        </td>

                        <td class="px-6 py-4">
                            @if($post->featured_image)
                                <img
                                    src="{{ Storage::url($post->featured_image) }}"
                                    alt="{{ $post->title }}"
                                    class="w-12 h-12 object-cover rounded-lg border"
                                >
                            @else
                                <span class="text-gray-400 text-sm">No image</span>
                            @endif
                        </td>

                        <td class="px-6 py-4 text-gray-500">
                            {{ $post->category ? $post->category->name : 'Uncategorized' }}
                        </td>

                        <td class="px-6 py-4 text-gray-500">
                            {{ $post->published_at ? $post->published_at->format('Y-m-d H:i') : '-' }}
                        </td>

                        <td class="px-6 py-4">

                            @if($post->status)

                                <span class="px-3 py-1 text-sm bg-green-100 text-green-700 rounded-full">
                                    Published
                                </span>

                            @else

                                <span class="px-3 py-1 text-sm bg-gray-100 text-gray-600 rounded-full">
                                    Draft
                                </span>

                            @endif

                        </td>

                        <td class="px-6 py-4">

                            <div class="flex justify-end gap-3">

                                <a
                                    href="{{ route('admin.posts.show', $post) }}"
                                    class="text-blue-600 hover:underline"
                                >
                                    View
                                </a>

                                <a
                                    href="{{ route('admin.posts.edit', $post) }}"
                                    class="text-indigo-600 hover:underline"
                                >
                                    Edit
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
                                        class="text-red-600 hover:underline"
                                    >
                                        Delete
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="7"
                            class="px-6 py-10 text-center text-gray-500"
                        >
                            No posts found.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>


    {{-- Pagination --}}
    <div class="mt-6">

        {{ $posts->links() }}

    </div>

</div>

@endsection
