@extends('admin.layouts.app')

@section('title', 'Users')

@section('page-title', 'Users')

@section('content')

<div>

    <div class="flex justify-between items-center mb-8">

        <div>

            <h1 class="text-2xl font-bold">
                Users
            </h1>

            <p class="text-gray-500 mt-1">
                Manage CMS users and their roles.
            </p>

        </div>


        <a
            href="{{ route('admin.users.create') }}"
            class="bg-gray-900 text-white px-5 py-3 rounded-lg"
        >
            + Add User
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
                        Name
                    </th>

                    <th class="text-left p-4">
                        Email
                    </th>

                    <th class="text-left p-4">
                        Role
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

                @forelse($users as $user)

                    <tr class="border-t">

                        <td class="p-4 font-medium">
                            {{ $user->name }}
                        </td>

                        <td class="p-4">
                            {{ $user->email }}
                        </td>

                        <td class="p-4">

                            {{ $user->role?->name ?? 'No Role' }}

                        </td>

                        <td class="p-4">

                            @if($user->status)

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
                                    href="{{ route('admin.users.edit', $user) }}"
                                    class="text-blue-600"
                                >
                                    Edit
                                </a>


                                @if($user->id !== auth()->id())

                                    <form
                                        action="{{ route('admin.users.destroy', $user) }}"
                                        method="POST"
                                        onsubmit="return confirm('Delete this user?')"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button class="text-red-600">
                                            Delete
                                        </button>

                                    </form>

                                @endif

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="5"
                            class="p-8 text-center text-gray-500"
                        >
                            No users found.
                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>


    <div class="mt-6">

        {{ $users->links() }}

    </div>

</div>

@endsection