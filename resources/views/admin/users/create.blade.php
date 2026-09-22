@extends('admin.layouts.app')

@section('title', 'Create User')

@section('page-title', 'Create User')

@section('content')

<div class="max-w-2xl">

    <div class="bg-white rounded-xl shadow p-8">

        <form
            action="{{ route('admin.users.store') }}"
            method="POST"
        >

            @csrf


            <div class="mb-6">

                <label class="block font-medium mb-2">
                    Name *
                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
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
                    Email *
                </label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    class="w-full border rounded-lg px-4 py-3"
                    required
                >

                @error('email')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            <div class="mb-6">

                <label class="block font-medium mb-2">
                    Password *
                </label>

                <input
                    type="password"
                    name="password"
                    class="w-full border rounded-lg px-4 py-3"
                    required
                >

            </div>


            <div class="mb-6">

                <label class="block font-medium mb-2">
                    Confirm Password *
                </label>

                <input
                    type="password"
                    name="password_confirmation"
                    class="w-full border rounded-lg px-4 py-3"
                    required
                >

            </div>


            <div class="mb-6">

                <label class="block font-medium mb-2">
                    Role *
                </label>

                <select
                    name="role_id"
                    class="w-full border rounded-lg px-4 py-3"
                    required
                >

                    <option value="">
                        Select Role
                    </option>

                    @foreach($roles as $role)

                        <option
                            value="{{ $role->id }}"
                            {{ old('role_id') == $role->id ? 'selected' : '' }}
                        >
                            {{ $role->name }}
                        </option>

                    @endforeach

                </select>

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
                    Create User
                </button>


                <a
                    href="{{ route('admin.users.index') }}"
                    class="bg-gray-200 px-6 py-3 rounded-lg"
                >
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>

@endsection