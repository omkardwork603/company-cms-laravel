@extends('admin.layouts.app')

@section('title', 'Manage Menu')

@section('page-title', 'Manage Menu')

@section('content')

<div>

    @if(session('success'))

        <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-6">
            {{ session('success') }}
        </div>

    @endif


    <div class="flex justify-between items-center mb-8">

        <div>

            <h1 class="text-2xl font-bold">
                {{ $menu->name }}
            </h1>

            <p class="text-gray-500">
                Location: {{ $menu->location }}
            </p>

        </div>


        <a
            href="{{ route('admin.menus.items.create', $menu) }}"
            class="bg-gray-900 text-white px-5 py-3 rounded-lg"
        >
            + Add Menu Item
        </a>

    </div>


    <div class="bg-white rounded-xl shadow border">

        <div class="p-6 border-b">

            <h2 class="text-lg font-semibold">
                Menu Items
            </h2>

        </div>


        <div class="divide-y">

            @forelse(
                $menu->items->whereNull('parent_id')->sortBy('sort_order')
                as $item
            )

                {{-- Parent --}}

                <div class="p-5">

                    <div class="flex justify-between items-center">

                        <div>

                            <div class="font-semibold">
                                {{ $item->title }}
                            </div>

                            <div class="text-sm text-gray-500">
                                {{ $item->url }}
                            </div>

                        </div>


                        <div class="flex gap-4">

                            <a
                                href="{{ route('admin.menus.items.edit', [$menu, $item]) }}"
                                class="text-blue-600"
                            >
                                Edit
                            </a>


                            <form
                                action="{{ route('admin.menus.items.destroy', [$menu, $item]) }}"
                                method="POST"
                                onsubmit="return confirm('Delete this item?')"
                            >

                                @csrf
                                @method('DELETE')

                                <button class="text-red-600">
                                    Delete
                                </button>

                            </form>

                        </div>

                    </div>


                    {{-- Children --}}

                    @if($item->children->count())

                        <div class="ml-8 mt-4 space-y-3">

                            @foreach(
                                $item->children->where('status', true)->sortBy('sort_order')
                                as $child
                            )

                                <div class="flex justify-between items-center bg-gray-50 rounded-lg p-4">

                                    <div>

                                        <div class="font-medium">
                                            ↳ {{ $child->title }}
                                        </div>

                                        <div class="text-sm text-gray-500">
                                            {{ $child->url }}
                                        </div>

                                    </div>


                                    <div class="flex gap-4">

                                        <a
                                            href="{{ route('admin.menus.items.edit', [$menu, $child]) }}"
                                            class="text-blue-600"
                                        >
                                            Edit
                                        </a>


                                        <form
                                            action="{{ route('admin.menus.items.destroy', [$menu, $child]) }}"
                                            method="POST"
                                            onsubmit="return confirm('Delete this item?')"
                                        >

                                            @csrf
                                            @method('DELETE')

                                            <button class="text-red-600">
                                                Delete
                                            </button>

                                        </form>

                                    </div>

                                </div>

                            @endforeach

                        </div>

                    @endif

                </div>

            @empty

                <div class="p-10 text-center text-gray-500">

                    No menu items yet.

                </div>

            @endforelse

        </div>

    </div>

</div>

@endsection