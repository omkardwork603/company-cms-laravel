@extends('admin.layouts.app')

@section('title', 'Upload Media')

@section('page-title', 'Upload Media')

@section('content')

<div class="max-w-3xl">

    <div class="bg-white rounded-xl shadow p-8">


        <form
            action="{{ route('admin.media.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf


            {{-- File --}}

            <div class="mb-6">

                <label class="block font-medium mb-2">
                    File *
                </label>

                <input
                    type="file"
                    name="file"
                    class="w-full border rounded-lg px-4 py-3"
                    accept=".jpg,.jpeg,.png,.webp,.gif,.pdf"
                    required
                >

                <p class="text-sm text-gray-500 mt-2">
                    JPG, JPEG, PNG, WEBP, GIF or PDF.
                    Maximum size: 5 MB.
                </p>


                @error('file')

                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>

                @enderror

            </div>


            {{-- Alt Text --}}

            <div class="mb-6">

                <label class="block font-medium mb-2">
                    Alt Text
                </label>

                <input
                    type="text"
                    name="alt_text"
                    value="{{ old('alt_text') }}"
                    placeholder="Company office building"
                    class="w-full border rounded-lg px-4 py-3"
                >


                @error('alt_text')

                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>

                @enderror

            </div>


            {{-- Buttons --}}

            <div class="flex gap-3">

                <button
                    type="submit"
                    class="bg-gray-900 text-white px-6 py-3 rounded-lg"
                >
                    Upload
                </button>


                <a
                    href="{{ route('admin.media.index') }}"
                    class="bg-gray-200 px-6 py-3 rounded-lg"
                >
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>

@endsection