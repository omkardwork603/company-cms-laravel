@extends('admin.layouts.app')

@section('title', 'Add Menu Item')

@section('page-title', 'Add Menu Item')

@section('content')

<div class="max-w-2xl">

    <div class="bg-white rounded-xl shadow p-8">

        <form
            action="{{ route('admin.menus.items.store', $menu) }}"
            method="POST"
        >

            @csrf


            <div class="mb-6">

                <label class="block font-medium mb-2">
                    Title *
                </label>

                <input
                    type="text"
                    name="title"
                    value="{{ old('title') }}"
                    placeholder="About"
                    class="w-full border rounded-lg px-4 py-3"
                    required
                >

            </div>


            <div class="mb-6">

                <label class="block font-medium mb-2">
                    URL
                </label>

                <input
                    type="text"
                    name="url"
                    value="{{ old('url') }}"
                    placeholder="/about"
                    class="w-full border rounded-lg px-4 py-3"
                >

                <p class="text-sm text-gray-500 mt-2">
                    Example: /about, /services, /blog
                </p>

            </div>


            <div class="mb-6">

                <label class="block font-medium mb-2">
                    Parent Menu
                </label>

                <select
                    name="parent_id"
                    class="w-full border rounded-lg px-4 py-3"
                >

                    <option value="">
                        None — Main Menu Item
                    </option>

                    @foreach($items as $item)

                        <option
                            value="{{ $item->id }}"
                            {{ old('parent_id') == $item->id ? 'selected' : '' }}
                        >
                            {{ $item->title }}
                        </option>

                    @endforeach

                </select>

            </div>


            <div class="mb-6">

                <label class="block font-medium mb-2">
                    Open Link
                </label>

                <select
                    name="target"
                    class="w-full border rounded-lg px-4 py-3"
                >

                    <option value="_self">
                        Same Window
                    </option>

                    <option value="_blank">
                        New Window
                    </option>

                </select>

            </div>


            <div class="mb-6">

                <label class="block font-medium mb-2">
                    Sort Order
                </label>

                <input
                    type="number"
                    name="sort_order"
                    value="{{ old('sort_order', 0) }}"
                    min="0"
                    class="w-full border rounded-lg px-4 py-3"
                >

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
                    Add Item
                </button>


                <a
                    href="{{ route('admin.menus.edit', $menu) }}"
                    class="bg-gray-200 px-6 py-3 rounded-lg"
                >
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>

@endsection