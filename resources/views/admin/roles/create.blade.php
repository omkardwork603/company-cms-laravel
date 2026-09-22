@extends('admin.layouts.app')

@section('title', 'Create Role')

@section('page-title', 'Create Role')

@section('content')

<div class="max-w-2xl">

    <div class="bg-white rounded-xl shadow p-8">

        <form
            action="{{ route('admin.roles.store') }}"
            method="POST"
        >

            @csrf


            <div class="mb-6">

                <label class="block font-medium mb-2">
                    Role Name *
                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Editor"
                    class="w-full border rounded-lg px-4 py-3"
                    required
                >

            </div>


            <div class="mb-6">

                <label class="block font-medium mb-2">
                    Description
                </label>

                <textarea
                    name="description"
                    rows="4"
                    class="w-full border rounded-lg px-4 py-3"
                    placeholder="Can manage website content."
                >{{ old('description') }}</textarea>

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
                    Create Role
                </button>


                <a
                    href="{{ route('admin.roles.index') }}"
                    class="bg-gray-200 px-6 py-3 rounded-lg"
                >
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>

@endsection