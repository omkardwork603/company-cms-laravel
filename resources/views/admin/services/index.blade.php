@extends('admin.layouts.app')

@section('title', 'Services')

@section('page-title', 'Services')

@section('content')

<div>

    {{-- Header --}}
    <div class="flex justify-between items-center mb-6">

        <div>

            <h1 class="text-2xl font-bold text-gray-800">
                Services
            </h1>

            <p class="text-gray-500 mt-1">
                Manage your company services.
            </p>

        </div>

        <a
            href="{{ route('admin.services.create') }}"
            class="bg-gray-900 text-white px-5 py-3 rounded-lg hover:bg-gray-800"
        >
            + Add Service
        </a>

    </div>


    {{-- Success Message --}}
    @if(session('success'))

        <div class="bg-green-100 text-green-700 px-4 py-3 rounded-lg mb-6">

            {{ session('success') }}

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
                        Slug
                    </th>

                    <th class="text-left px-6 py-4">
                        Order
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

                @forelse($services as $service)

                    <tr class="border-b">

                        <td class="px-6 py-4">
                            {{ $service->id }}
                        </td>

                        <td class="px-6 py-4 font-medium">
                            {{ $service->title }}
                        </td>

                        <td class="px-6 py-4">
                            @if($service->image)
                                <img
                                    src="{{ Storage::url($service->image) }}"
                                    alt="{{ $service->title }}"
                                    class="w-12 h-12 object-cover rounded-lg border"
                                >
                            @else
                                <span class="text-gray-400 text-sm">No image</span>
                            @endif
                        </td>

                        <td class="px-6 py-4 text-gray-500">
                            /{{ $service->slug }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $service->display_order }}
                        </td>

                        <td class="px-6 py-4">

                            @if($service->status)

                                <span class="px-3 py-1 text-sm bg-green-100 text-green-700 rounded-full">
                                    Active
                                </span>

                            @else

                                <span class="px-3 py-1 text-sm bg-gray-100 text-gray-600 rounded-full">
                                    Draft
                                </span>

                            @endif

                        </td>

                        <td class="px-6 py-4">

                            <div class="flex justify-end gap-3">

                                {{-- <a
                                    href="{{ $service->frontend_url }}"
                                    target="_blank"
                                    class="text-emerald-600 hover:underline"
                                >
                                    //
                                </a> --}}

                                <a
                                    href="{{ route('admin.services.show', $service) }}"
                                    class="text-blue-600 hover:underline"
                                >
                                    View
                                </a>

                                <a
                                    href="{{ route('admin.services.edit', $service) }}"
                                    class="text-indigo-600 hover:underline"
                                >
                                    Edit
                                </a>

                                <form
                                    action="{{ route('admin.services.destroy', $service) }}"
                                    method="POST"
                                    onsubmit="return confirm('Delete this service?')"
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
                            No services found.
                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>


    <div class="mt-6">

        {{ $services->links() }}

    </div>

</div>

@endsection
