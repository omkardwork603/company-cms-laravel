@extends('admin.layouts.app')

@section('title', 'Media Library')

@section('page-title', 'Media Library')

@section('content')

<div>

    {{-- Header --}}

    <div class="flex justify-between items-center mb-8">

        <div>

            <h1 class="text-2xl font-bold">
                Media Library
            </h1>

            <p class="text-gray-500 mt-1">
                Manage images and files used across your website.
            </p>

        </div>


        <a
            href="{{ route('admin.media.create') }}"
            class="bg-gray-900 text-white px-5 py-3 rounded-lg"
        >
            + Upload Media
        </a>

    </div>


    {{-- Success Message --}}

    @if(session('success'))

        <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-6">

            {{ session('success') }}

        </div>

    @endif


    {{-- Media Grid --}}

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

        @forelse($media as $item)

            <div class="bg-white rounded-xl shadow border overflow-hidden">


                {{-- Preview --}}

                <div class="h-48 bg-gray-100 flex items-center justify-center">

                    @if($item->isImage())

                        <img
                            src="{{ $item->url }}"
                            alt="{{ $item->alt_text ?? $item->name }}"
                            class="w-full h-full object-cover"
                        >

                    @else

                        <div class="text-center">

                            <div class="text-4xl mb-2">
                                📄
                            </div>

                            <p class="text-gray-500 text-sm">
                                {{ strtoupper($item->mime_type ?? 'FILE') }}
                            </p>

                        </div>

                    @endif

                </div>


                {{-- Information --}}

                <div class="p-4">

                    <h3 class="font-semibold truncate">
                        {{ $item->name }}
                    </h3>

                    <p class="text-sm text-gray-500 mt-1 truncate">
                        {{ $item->file_name }}
                    </p>


                    @if($item->file_size)

                        <p class="text-xs text-gray-400 mt-2">

                            {{ number_format($item->file_size / 1024, 1) }}
                            KB

                        </p>

                    @endif


                    {{-- Actions --}}

                    <div class="flex justify-between items-center mt-4">

                        <a
                            href="{{ $item->url }}"
                            target="_blank"
                            class="text-blue-600 text-sm"
                        >
                            Open
                        </a>


                        <form
                            action="{{ route('admin.media.destroy', $item) }}"
                            method="POST"
                            onsubmit="return confirm('Delete this media file?')"
                        >

                            @csrf

                            @method('DELETE')

                            <button
                                class="text-red-600 text-sm"
                            >
                                Delete
                            </button>

                        </form>

                    </div>

                </div>

            </div>

        @empty

            <div class="col-span-full">

                <div class="bg-white border rounded-xl p-12 text-center">

                    <h2 class="text-xl font-semibold">
                        No media found
                    </h2>

                    <p class="text-gray-500 mt-2">
                        Upload your first image or file.
                    </p>

                </div>

            </div>

        @endforelse

    </div>


    {{-- Pagination --}}

    <div class="mt-8">

        {{ $media->links() }}

    </div>

</div>

@endsection