@extends('admin.layouts.app')

@section('title', 'Roles')

@section('page-title', 'Roles')

@section('content')

<div>

    <div class="flex justify-between items-center mb-8">

        <div>

            <h1 class="text-2xl font-bold">
                Roles
            </h1>

            <p class="text-gray-500 mt-1">
                Manage user roles.
            </p>

        </div>


        <a
            href="{{ route('admin.roles.create') }}"
            class="bg-gray-900 text-white px-5 py-3 rounded-lg"
        >
            + Create Role
        </a>

    </div>


    @if(session('success'))

        <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-6">
            {{ session('success') }}
        </div>

    @endif


    @if(session('error'))

        <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-6">
            {{ session('error') }}
        </div>

    @endif


    <div class="bg-white rounded-xl shadow border overflow-hidden">

        <table class="w-full">

            <thead class="bg-gray-50">

                <tr>

                    <th class="text-left p-4">
                        Role
                    </th>

                    <th class="text-left p-4">
                        Slug
                    </th>

                    <th class="text-left p-4">
                        Users
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

                @forelse($roles as $role)

                    <tr class="border-t">

                        <td class="p-4 font-medium">
                            {{ $role->name }}
                        </td>

                        <td class="p-4">
                            {{ $role->slug }}
                        </td>

                        <td class="p-4">
                            {{ $role->users_count }}
                        </td>

                        <td class="p-4">

                            @if($role->status)

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
                                    href="{{ route('admin.roles.edit', $role) }}"
                                    class="text-blue-600"
                                >
                                    Edit
                                </a>


                                <form
                                    action="{{ route('admin.roles.destroy', $role) }}"
                                    method="POST"
                                    onsubmit="return confirm('Delete this role?')"
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
                            No roles found.
                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection