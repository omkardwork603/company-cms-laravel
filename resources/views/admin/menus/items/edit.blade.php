@extends('admin.layouts.app')

@section('title', 'Edit Menu Item')

@section('page-title', 'Edit Menu Item')

@section('content')

<div class="max-w-2xl">

    <div class="bg-white rounded-xl shadow p-8">

        <form
            action="{{ route('admin.menus.items.update', [$menu, $menuItem]) }}"
            method="POST"
        >

            @csrf
            @method('PUT')


            <div class="mb-6">

                <label class="block font-medium mb-2">
                    Title *
                </label>

                <input
                    type="text"
                    name="title"
                    value="{{ old('title', $menuItem->title) }}"
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
                    value="{{ old('url', $menuItem->url) }}"
                    class="w-full border rounded-lg px-4 py-3"
                >

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
                            {{ old('parent_id', $menuItem->parent_id) == $item->id ? 'selected' : '' }}
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

                    <option
                        value="_self"
                        {{ $menuItem->target === '_self' ? 'selected' : '' }}
                    >
                        Same Window
                    </option>

                    <option
                        value="_blank"
                        {{ $menuItem->target === '_blank' ? 'selected' : '' }}
                    >
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
                    value="{{ old('sort_order', $menuItem->sort_order) }}"
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
                        {{ $menuItem->status ? 'checked' : '' }}
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
                    Update Item
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