@extends('admin.layouts.app')

@section('title', 'Add Team Member')

@section('page-title', 'Add Team Member')

@section('content')

<div class="max-w-4xl">

    <div class="bg-white rounded-lg shadow p-8">

        <form
            action="{{ route('admin.team.store') }}"
            method="POST"
        >

            @csrf


            {{-- Name --}}
            <div class="mb-6">

                <label class="block font-medium text-gray-700 mb-2">
                    Name
                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="John Doe"
                    class="w-full border rounded-lg px-4 py-3"
                    required
                >

                @error('name')

                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>

                @enderror

            </div>


            {{-- Slug --}}
            <div class="mb-6">

                <label class="block font-medium text-gray-700 mb-2">
                    Slug
                </label>

                <input
                    type="text"
                    name="slug"
                    value="{{ old('slug') }}"
                    placeholder="john-doe"
                    class="w-full border rounded-lg px-4 py-3"
                >

                <p class="text-gray-500 text-sm mt-1">
                    Leave empty to generate automatically.
                </p>

            </div>


            {{-- Designation --}}
            <div class="mb-6">

                <label class="block font-medium text-gray-700 mb-2">
                    Designation
                </label>

                <input
                    type="text"
                    name="designation"
                    value="{{ old('designation') }}"
                    placeholder="Managing Director"
                    class="w-full border rounded-lg px-4 py-3"
                >

            </div>


            {{-- Department --}}
            <div class="mb-6">

                <label class="block font-medium text-gray-700 mb-2">
                    Department
                </label>

                <input
                    type="text"
                    name="department"
                    value="{{ old('department') }}"
                    placeholder="Management"
                    class="w-full border rounded-lg px-4 py-3"
                >

            </div>


            {{-- Email --}}
            <div class="mb-6">

                <label class="block font-medium text-gray-700 mb-2">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="john@example.com"
                    class="w-full border rounded-lg px-4 py-3"
                >

                @error('email')

                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>

                @enderror

            </div>


            {{-- Phone --}}
            <div class="mb-6">

                <label class="block font-medium text-gray-700 mb-2">
                    Phone
                </label>

                <input
                    type="text"
                    name="phone"
                    value="{{ old('phone') }}"
                    placeholder="+91 9876543210"
                    class="w-full border rounded-lg px-4 py-3"
                >

            </div>


            {{-- Bio --}}
            <div class="mb-6">

                <label class="block font-medium text-gray-700 mb-2">
                    Bio
                </label>

                <textarea
                    name="bio"
                    rows="6"
                    class="w-full border rounded-lg px-4 py-3"
                    placeholder="Team member biography..."
                >{{ old('bio') }}</textarea>

            </div>


            {{-- Profile Image --}}
            <div class="mb-6">

                <label class="block font-medium text-gray-700 mb-2">
                    Profile Image
                </label>

                <input
                    type="text"
                    name="profile_image"
                    value="{{ old('profile_image') }}"
                    placeholder="team/john-doe.jpg"
                    class="w-full border rounded-lg px-4 py-3"
                >

            </div>


            {{-- LinkedIn --}}
            <div class="mb-6">

                <label class="block font-medium text-gray-700 mb-2">
                    LinkedIn URL
                </label>

                <input
                    type="url"
                    name="linkedin_url"
                    value="{{ old('linkedin_url') }}"
                    placeholder="https://linkedin.com/in/john-doe"
                    class="w-full border rounded-lg px-4 py-3"
                >

            </div>


            {{-- Twitter --}}
            <div class="mb-6">

                <label class="block font-medium text-gray-700 mb-2">
                    Twitter / X URL
                </label>

                <input
                    type="url"
                    name="twitter_url"
                    value="{{ old('twitter_url') }}"
                    placeholder="https://x.com/johndoe"
                    class="w-full border rounded-lg px-4 py-3"
                >

            </div>


            {{-- Facebook --}}
            <div class="mb-6">

                <label class="block font-medium text-gray-700 mb-2">
                    Facebook URL
                </label>

                <input
                    type="url"
                    name="facebook_url"
                    value="{{ old('facebook_url') }}"
                    placeholder="https://facebook.com/johndoe"
                    class="w-full border rounded-lg px-4 py-3"
                >

            </div>


            {{-- Display Order --}}
            <div class="mb-6">

                <label class="block font-medium text-gray-700 mb-2">
                    Display Order
                </label>

                <input
                    type="number"
                    name="display_order"
                    value="{{ old('display_order', 0) }}"
                    min="0"
                    class="w-full border rounded-lg px-4 py-3"
                >

            </div>


            {{-- Status --}}
            <div class="mb-6">

                <label class="block font-medium text-gray-700 mb-2">
                    Status
                </label>

                <select
                    name="status"
                    class="w-full border rounded-lg px-4 py-3"
                >

                    <option value="1">
                        Active
                    </option>

                    <option value="0">
                        Draft
                    </option>

                </select>

            </div>


            {{-- Buttons --}}
            <div class="flex gap-3">

                <button
                    type="submit"
                    class="bg-gray-900 text-white px-6 py-3 rounded-lg"
                >
                    Create Team Member
                </button>

                <a
                    href="{{ route('admin.team.index') }}"
                    class="bg-gray-200 px-6 py-3 rounded-lg"
                >
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>

@endsection