@extends('admin.layouts.app')

@section('title', 'Team')

@section('page-title', 'Team')

@section('content')

<div>

    {{-- Header --}}
    <div class="flex justify-between items-center mb-6">

        <div>

            <h1 class="text-2xl font-bold text-gray-800">
                Team
            </h1>

            <p class="text-gray-500 mt-1">
                Manage your company team members.
            </p>

        </div>

        <a
            href="{{ route('admin.team.create') }}"
            class="bg-gray-900 text-white px-5 py-3 rounded-lg"
        >
            + Add Team Member
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
                        Name
                    </th>

                    <th class="text-left px-6 py-4">
                        Designation
                    </th>

                    <th class="text-left px-6 py-4">
                        Department
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

                @forelse($teamMembers as $member)

                    <tr class="border-b">

                        <td class="px-6 py-4">
                            {{ $member->id }}
                        </td>

                        <td class="px-6 py-4 font-medium">
                            {{ $member->name }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $member->designation ?? '—' }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $member->department ?? '—' }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $member->display_order }}
                        </td>

                        <td class="px-6 py-4">

                            @if($member->status)

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

                                <a
                                    href="{{ route('admin.team.show', $member) }}"
                                    class="text-blue-600"
                                >
                                    View
                                </a>

                                <a
                                    href="{{ route('admin.team.edit', $member) }}"
                                    class="text-indigo-600"
                                >
                                    Edit
                                </a>

                                <form
                                    action="{{ route('admin.team.destroy', $member) }}"
                                    method="POST"
                                    onsubmit="return confirm('Delete this team member?')"
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
                            colspan="7"
                            class="px-6 py-10 text-center text-gray-500"
                        >
                            No team members found.
                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>


    {{-- Pagination --}}
    <div class="mt-6">

        {{ $teamMembers->links() }}

    </div>

</div>

@endsection