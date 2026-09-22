@extends('admin.layouts.app')

@section('title', 'Projects')

@section('page-title', 'Projects')

@section('content')

<div>

    {{-- Header --}}
    <div class="flex justify-between items-center mb-6">

        <div>

            <h1 class="text-2xl font-bold text-gray-800">
                Projects
            </h1>

            <p class="text-gray-500 mt-1">
                Manage your company projects.
            </p>

        </div>

        <a
            href="{{ route('admin.projects.create') }}"
            class="bg-gray-900 text-white px-5 py-3 rounded-lg"
        >
            + Add Project
        </a>

    </div>


    {{-- Success --}}
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
                        Project
                    </th>

                    <th class="text-left px-6 py-4">
                        Image
                    </th>

                    <th class="text-left px-6 py-4">
                        Client
                    </th>

                    <th class="text-left px-6 py-4">
                        Category
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

                @forelse($projects as $project)

                    <tr class="border-b">

                        <td class="px-6 py-4">
                            {{ $project->id }}
                        </td>

                        <td class="px-6 py-4 font-medium">
                            {{ $project->title }}
                        </td>

                        <td class="px-6 py-4">
                            @if($project->featured_image)
                                <img
                                    src="{{ Storage::url($project->featured_image) }}"
                                    alt="{{ $project->title }}"
                                    class="w-12 h-12 object-cover rounded-lg border"
                                >
                            @else
                                <span class="text-gray-400 text-sm">No image</span>
                            @endif
                        </td>

                        <td class="px-6 py-4">
                            {{ $project->client_name ?? '—' }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $project->category ?? '—' }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $project->display_order }}
                        </td>

                        <td class="px-6 py-4">

                            @if($project->status)

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
                                    href="{{ $project->frontend_url }}"
                                    target="_blank"
                                    class="text-emerald-600 hover:underline"
                                >
                                    //
                                </a> --}}

                                <a
                                    href="{{ route('admin.projects.show', $project) }}"
                                    class="text-blue-600"
                                >
                                    View
                                </a>

                                <a
                                    href="{{ route('admin.projects.edit', $project) }}"
                                    class="text-indigo-600"
                                >
                                    Edit
                                </a>

                                <form
                                    action="{{ route('admin.projects.destroy', $project) }}"
                                    method="POST"
                                    onsubmit="return confirm('Delete this project?')"
                                >

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="text-red-600"
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
                            colspan="8"
                            class="px-6 py-10 text-center text-gray-500"
                        >
                            No projects found.
                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>


    {{-- Pagination --}}
    <div class="mt-6">

        {{ $projects->links() }}

    </div>

</div>

@endsection