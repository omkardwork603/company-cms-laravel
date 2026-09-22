@extends('admin.layouts.app')

@section('title', 'Menus')

@section('page-title', 'Menus')

@section('content')

<div>

    <div class="flex justify-between items-center mb-8">

        <div>

            <h1 class="text-2xl font-bold">
                Menus
            </h1>

            <p class="text-gray-500 mt-1">
                Manage website navigation menus.
            </p>

        </div>


        <a
            href="{{ route('admin.menus.create') }}"
            class="bg-gray-900 text-white px-5 py-3 rounded-lg"
        >
            + Create Menu
        </a>

    </div>


    @if(session('success'))

        <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-6">
            {{ session('success') }}
        </div>

    @endif


    <div class="bg-white rounded-xl shadow border overflow-hidden">

        <table class="w-full">

            <thead class="bg-gray-50">

                <tr>

                    <th class="text-left p-4">
                        Name
                    </th>

                    <th class="text-left p-4">
                        Location
                    </th>

                    <th class="text-left p-4">
                        Items
                    </th>

                    <th class="text-left p-4">
                        Status
                    </th>

                    <th class="text-right p-4">
                        Actions
                    </th>

                </tr>

            </thead>


            <tbody>

                @forelse($menus as $menu)

                    <tr class="border-t">

                        <td class="p-4 font-medium">
                            {{ $menu->name }}
                        </td>

                        <td class="p-4">
                            {{ $menu->location }}
                        </td>

                        <td class="p-4">
                            {{ $menu->items_count }}
                        </td>

                        <td class="p-4">

                            @if($menu->status)

                                <span class="text-green-600">
                                    Active
                                </span>

                            @else

                                <span class="text-red-600">
                                    Inactive
                                </span>

                            @endif

                        </td>

                        <td class="p-4">

                            <div class="flex justify-end gap-4">

                                <a
                                    href="{{ route('admin.menus.edit', $menu) }}"
                                    class="text-blue-600"
                                >
                                    Manage
                                </a>


                                <form
                                    action="{{ route('admin.menus.destroy', $menu) }}"
                                    method="POST"
                                    onsubmit="return confirm('Delete this menu?')"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button class="text-red-600">
                                        Delete
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="5"
                            class="p-8 text-center text-gray-500"
                        >
                            No menus found.
                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection