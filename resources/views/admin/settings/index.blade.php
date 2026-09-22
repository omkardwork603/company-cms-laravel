@extends('admin.layouts.app')

@section('title', 'Settings')

@section('page-title', 'Settings')

@section('content')

<div class="max-w-4xl">

    @if(session('success'))

        <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-6">
            {{ session('success') }}
        </div>

    @endif


    <form
        action="{{ route('admin.settings.update') }}"
        method="POST"
        enctype="multipart/form-data"
    >

        @csrf
        @method('PUT')


        {{-- Home Page Hero Section Settings --}}
        <div class="bg-white rounded-lg shadow p-8 mb-6 border-2 border-blue-500/20">

            <div class="flex items-center gap-3 mb-6 border-b pb-4">
                <span class="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-100 text-blue-600 text-xl">
                    🏠
                </span>
                <div>
                    <h3 class="text-lg font-bold text-gray-900">
                        Home Page Main Section Settings
                    </h3>
                    <p class="text-xs text-gray-500">
                        Edit the welcome title, tagline, description, and hero banner displayed on the home page (http://localhost:8000/).
                    </p>
                </div>
            </div>

            {{-- Company Name / Welcome Heading --}}
            <div class="mb-6">

                <label class="block font-semibold text-gray-800 mb-2">
                    Welcome Title / Company Name
                </label>

                <input
                    type="text"
                    name="site_name"
                    value="{{ old('site_name', $setting->site_name ?? 'Our Company') }}"
                    placeholder="Our Company"
                    class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    required
                >
                <p class="text-xs text-gray-500 mt-1">Displays as: <strong>Welcome to [Company Name]</strong></p>

                @error('site_name')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror

            </div>

            {{-- Tagline --}}
            <div class="mb-6">

                <label class="block font-semibold text-gray-800 mb-2">
                    Hero Tagline / Subheading
                </label>

                <input
                    type="text"
                    name="site_tagline"
                    value="{{ old('site_tagline', $setting->site_tagline ?? 'Building Better Solutions for Your Business') }}"
                    placeholder="Building Better Solutions for Your Business"
                    class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                >

                @error('site_tagline')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror

            </div>

            {{-- Details / Description --}}
            <div class="mb-6">

                <label class="block font-semibold text-gray-800 mb-2">
                    Hero Description Paragraph
                </label>

                <textarea
                    name="details"
                    rows="4"
                    placeholder="We provide innovative solutions designed to help businesses grow, improve performance and achieve long-term success."
                    class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                >{{ old('details', $setting?->details ?? 'We provide innovative solutions designed to help businesses grow, improve performance and achieve long-term success.') }}</textarea>

                @error('details')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror

            </div>

        </div>


        {{-- Branding & Hero Image --}}
        <div class="bg-white rounded-lg shadow p-8 mb-6">

            <h3 class="text-lg font-semibold text-gray-800 mb-6">
                Branding & Main Page Image
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-2">

                {{-- Logo --}}
                <div>

                    <label class="block font-medium text-gray-700 mb-2">
                        Logo
                    </label>

                    @if($setting->logo)
                        <img
                            src="{{ asset('storage/' . $setting->logo) }}"
                            alt="Current logo"
                            class="h-16 mb-3 border rounded p-2 bg-gray-50 object-contain"
                        >
                    @endif

                    <input
                        type="file"
                        name="logo"
                        accept="image/*"
                        class="w-full border rounded-lg px-4 py-3 bg-white"
                    >

                    <p class="text-gray-500 text-sm mt-1">
                        PNG, JPG, WEBP or SVG. Max 2MB.
                    </p>

                    @error('logo')
                        <p class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                {{-- Favicon --}}
                <div>

                    <label class="block font-medium text-gray-700 mb-2">
                        Favicon
                    </label>

                    @if($setting->favicon)
                        <img
                            src="{{ asset('storage/' . $setting->favicon) }}"
                            alt="Current favicon"
                            class="h-16 w-16 mb-3 border rounded p-2 bg-gray-50 object-contain"
                        >
                    @endif

                    <input
                        type="file"
                        name="favicon"
                        accept="image/*"
                        class="w-full border rounded-lg px-4 py-3 bg-white"
                    >

                    <p class="text-gray-500 text-sm mt-1">
                        PNG, ICO or SVG. Max 512KB.
                    </p>

                    @error('favicon')
                        <p class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                {{-- Hero Image --}}
                <div>

                    <label class="block font-medium text-gray-700 mb-2">
                        Home Page Hero Image
                    </label>

                    @if($setting->hero_image)
                        <img
                            src="{{ asset('storage/' . $setting->hero_image) }}"
                            alt="Home hero image"
                            class="h-16 w-28 mb-3 border rounded p-1 bg-gray-50 object-cover"
                        >
                    @endif

                    <input
                        type="file"
                        name="hero_image"
                        accept="image/*"
                        class="w-full border rounded-lg px-4 py-3 bg-white"
                    >

                    <p class="text-gray-500 text-sm mt-1">
                        Hero image on home page. Max 4MB.
                    </p>

                    @error('hero_image')
                        <p class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

            </div>

        </div>


        {{-- Contact --}}
        <div class="bg-white rounded-lg shadow p-8 mb-6">

            <h3 class="text-lg font-semibold text-gray-800 mb-6">
                Contact Information
            </h3>

            <div class="grid grid-cols-2 gap-6 mb-6">

                <div>

                    <label class="block font-medium text-gray-700 mb-2">
                        Contact Email
                    </label>

                    <input
                        type="email"
                        name="contact_email"
                        value="{{ old('contact_email', $setting->contact_email) }}"
                        placeholder="[email protected]"
                        class="w-full border rounded-lg px-4 py-3"
                    >

                    @error('contact_email')
                        <p class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                <div>

                    <label class="block font-medium text-gray-700 mb-2">
                        Contact Phone
                    </label>

                    <input
                        type="text"
                        name="contact_phone"
                        value="{{ old('contact_phone', $setting->contact_phone) }}"
                        placeholder="+91 00000 00000"
                        class="w-full border rounded-lg px-4 py-3"
                    >

                    @error('contact_phone')
                        <p class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

            </div>

            <div class="mb-2">

                <label class="block font-medium text-gray-700 mb-2">
                    Address
                </label>

                <textarea
                    name="address"
                    rows="3"
                    placeholder="Company address"
                    class="w-full border rounded-lg px-4 py-3"
                >{{ old('address', $setting->address) }}</textarea>

                @error('address')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror

            </div>

        </div>


        {{-- Social Links --}}
        <div class="bg-white rounded-lg shadow p-8 mb-6">

            <h3 class="text-lg font-semibold text-gray-800 mb-6">
                Social Links
            </h3>

            <div class="grid grid-cols-2 gap-6">

                <div>

                    <label class="block font-medium text-gray-700 mb-2">
                        Facebook URL
                    </label>

                    <input
                        type="url"
                        name="facebook_url"
                        value="{{ old('facebook_url', $setting->facebook_url) }}"
                        placeholder="https://facebook.com/yourpage"
                        class="w-full border rounded-lg px-4 py-3"
                    >

                    @error('facebook_url')
                        <p class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                <div>

                    <label class="block font-medium text-gray-700 mb-2">
                        Twitter / X URL
                    </label>

                    <input
                        type="url"
                        name="twitter_url"
                        value="{{ old('twitter_url', $setting->twitter_url) }}"
                        placeholder="https://x.com/yourhandle"
                        class="w-full border rounded-lg px-4 py-3"
                    >

                    @error('twitter_url')
                        <p class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                <div>

                    <label class="block font-medium text-gray-700 mb-2">
                        Instagram URL
                    </label>

                    <input
                        type="url"
                        name="instagram_url"
                        value="{{ old('instagram_url', $setting->instagram_url) }}"
                        placeholder="https://instagram.com/yourpage"
                        class="w-full border rounded-lg px-4 py-3"
                    >

                    @error('instagram_url')
                        <p class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                <div>

                    <label class="block font-medium text-gray-700 mb-2">
                        LinkedIn URL
                    </label>

                    <input
                        type="url"
                        name="linkedin_url"
                        value="{{ old('linkedin_url', $setting->linkedin_url) }}"
                        placeholder="https://linkedin.com/company/yourpage"
                        class="w-full border rounded-lg px-4 py-3"
                    >

                    @error('linkedin_url')
                        <p class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

            </div>

        </div>


       


        {{-- Footer & Maintenance --}}
        <div class="bg-white rounded-lg shadow p-8 mb-6">

            <h3 class="text-lg font-semibold text-gray-800 mb-6">
                Footer & Maintenance
            </h3>

            <div class="mb-6">

                <label class="block font-medium text-gray-700 mb-2">
                    Footer Text
                </label>

                <textarea
                    name="footer_text"
                    rows="2"
                    placeholder="© 2026 Company. All rights reserved."
                    class="w-full border rounded-lg px-4 py-3"
                >{{ old('footer_text', $setting->footer_text) }}</textarea>

                @error('footer_text')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror

            </div>

            <div class="flex items-center gap-3">

                <input
                    type="hidden"
                    name="maintenance_mode"
                    value="0"
                >

                <input
                    type="checkbox"
                    id="maintenance_mode"
                    name="maintenance_mode"
                    value="1"
                    class="w-5 h-5"
                    {{ old('maintenance_mode', $setting->maintenance_mode) ? 'checked' : '' }}
                >

                <label for="maintenance_mode" class="font-medium text-gray-700">
                    Enable maintenance mode
                </label>

            </div>

        </div>


        {{-- Buttons --}}
        <div class="flex gap-3">

            <button
                type="submit"
                class="bg-gray-900 text-white px-6 py-3 rounded-lg hover:bg-gray-800"
            >
                Save Settings
            </button>

        </div>

    </form>

</div>

@endsection
