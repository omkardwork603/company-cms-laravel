@extends('admin.layouts.app')

@section('title', 'Create Menu')

@section('page-title', 'Create Menu')

@section('content')

<div class="max-w-2xl">

    <div class="bg-white rounded-xl shadow p-8">

        <form
            action="{{ route('admin.menus.store') }}"
            method="POST"
        >

            @csrf


            <div class="mb-6">

                <label class="block font-medium mb-2">
                    Menu Name *
                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Main Navigation"
                    class="w-full border rounded-lg px-4 py-3"
                    required
                >

                @error('name')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            <div class="mb-6">

                <label class="block font-medium mb-2">
                    Location *
                </label>

                <select
                    name="location"
                    class="w-full border rounded-lg px-4 py-3"
                    required
                >

                    <option value="">
                        Select Location
                    </option>

                    <option
                        value="header"
                        {{ old('location') === 'header' ? 'selected' : '' }}
                    >
                        Header
                    </option>

                    <option
                        value="footer"
                        {{ old('location') === 'footer' ? 'selected' : '' }}
                    >
                        Footer
                    </option>

                </select>

                @error('location')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            <div class="mb-6">

                <label class="inline-flex items-center">

                    <input
                        type="checkbox"
                        name="status"
                        value="1"
                        checked
                        class="mr-2"
                    >

                    Active

                </label>

            </div>


            <div class="flex gap-3">

                <button
                    type="submit"
                    class="bg-gray-900 text-white px-6 py-3 rounded-lg"
                >
                    Create Menu
                </button>

                <a
                    href="{{ route('admin.menus.index') }}"
                    class="bg-gray-200 px-6 py-3 rounded-lg"
                >
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>

@endsection