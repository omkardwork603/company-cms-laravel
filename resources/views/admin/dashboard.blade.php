@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('page-title', 'Dashboard')

@section('content')

<div class="space-y-8">


{{-- =========================================================
     MAIN HOME PAGE SECTION (http://localhost:8000/)
========================================================== --}}
{{-- <div class="relative overflow-hidden rounded-3xl bg-[#06111f] p-8 md:p-10 text-white shadow-xl border border-slate-800"> --}}

    {{-- Background Glow --}}
    {{-- <div class="absolute -right-24 -top-32 h-80 w-80 rounded-full bg-blue-600/20 blur-3xl"></div>
    <div class="absolute -bottom-32 left-1/3 h-72 w-72 rounded-full bg-indigo-600/10 blur-3xl"></div> --}}

    {{-- <div class="relative grid lg:grid-cols-12 gap-8 items-center"> --}}

        {{-- Left Content: Welcome to Our Company --}}
        {{-- <div class="lg:col-span-7 space-y-4">

            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-500/10 border border-blue-500/20 text-xs font-bold uppercase tracking-wider text-blue-400">
                <span>🌐 Main Public Page</span>
                <span class="text-slate-500">•</span>
                <span class="text-slate-300 font-mono">http://localhost:8000/</span>
            </div>

            <h1 class="text-3xl sm:text-4xl font-black tracking-tight text-white leading-tight">
                Welcome to {{ $settings?->site_name ?? $settings?->company_name ?? 'Our Company' }}
            </h1>

            <h2 class="text-xl font-bold text-blue-300">
                {{ $settings?->site_tagline ?? $settings?->tagline ?? 'Building Better Solutions for Your Business' }}
            </h2>

            <p class="text-slate-300 text-base leading-relaxed max-w-2xl">
                {{ $settings?->details ?? 'We provide innovative solutions designed to help businesses grow, improve performance and achieve long-term success.' }}
            </p>

            <div class="pt-2 flex flex-wrap items-center gap-4">
                <a href="{{ route('home') }}" target="_blank" class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-blue-600 hover:bg-blue-500 text-white text-sm font-bold shadow-lg shadow-blue-600/30 transition">
                    <span>Visit Main Home Page</span>
                    <span>↗</span>
                </a>

                <a href="{{ route('admin.settings.index') }}" class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-white/10 hover:bg-white/20 text-white text-sm font-medium transition">
                    <span>⚙ Edit Home Content</span>
                </a>
            </div>

        </div> --}}

        {{-- Right Section: Image Preview --}}
        {{-- <div class="lg:col-span-5 flex justify-center">
            <div class="relative w-full max-w-sm rounded-2xl overflow-hidden shadow-2xl border border-white/10 bg-slate-900/50 p-2">
                @if(!empty($settings?->hero_image))
                    <img src="{{ asset('storage/' . $settings->hero_image) }}" alt="Hero Image" class="w-full h-56 object-cover rounded-xl">
                @else
                    <div class="w-full h-56 rounded-xl bg-gradient-to-br from-slate-800 to-slate-900 border border-slate-700/50 flex flex-col items-center justify-center p-6 text-center">
                        <div class="h-16 w-16 rounded-full bg-blue-500/10 flex items-center justify-center text-3xl mb-3 text-blue-400">
                            🏢
                        </div>
                        <p class="text-sm font-bold text-slate-200">Our Company Solutions</p>
                        <p class="text-xs text-slate-400 mt-1">Main page featured image hero banner</p>
                    </div>
                @endif
            </div>
        </div> --}}

    {{-- </div> --}}

{{-- </div> --}}



{{-- =========================================================
     STATISTICS
========================================================== --}}
<div>

    <div class="mb-5 flex items-center justify-between">

        <div>

            <p class="text-xs font-bold uppercase tracking-[0.2em] text-blue-600">
                Overview
            </p>

            <h2 class="mt-1 text-xl font-black text-slate-900">
                Website Statistics
            </h2>

        </div>

    </div>


    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-4">


        {{-- Pages --}}
        <div class="group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-sm font-medium text-slate-500">
                        Pages
                    </p>

                    <h2 class="mt-3 text-3xl font-black text-slate-900">
                        {{ $stats['pages'] }}
                    </h2>

                </div>

                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-50 text-xl text-blue-600">
                    ▣
                </div>

            </div>

            <div class="mt-5 h-1.5 overflow-hidden rounded-full bg-slate-100">

                <div class="h-full w-3/4 rounded-full bg-blue-600"></div>

            </div>

            <p class="mt-3 text-xs font-medium text-slate-400">
                Website content
            </p>

        </div>



        {{-- Services --}}
        <div class="group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-sm font-medium text-slate-500">
                        Services
                    </p>

                    <h2 class="mt-3 text-3xl font-black text-slate-900">
                        {{ $stats['services'] }}
                    </h2>

                </div>

                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-indigo-50 text-xl text-indigo-600">
                    ◇
                </div>

            </div>

            <div class="mt-5 h-1.5 overflow-hidden rounded-full bg-slate-100">

                <div class="h-full w-3/4 rounded-full bg-indigo-600"></div>

            </div>

            <p class="mt-3 text-xs font-medium text-slate-400">
                Available services
            </p>

        </div>



        {{-- Products --}}
        <div class="group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-sm font-medium text-slate-500">
                        Products
                    </p>

                    <h2 class="mt-3 text-3xl font-black text-slate-900">
                        {{ $stats['products'] }}
                    </h2>

                </div>

                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-cyan-50 text-xl text-cyan-600">
                    □
                </div>

            </div>

            <div class="mt-5 h-1.5 overflow-hidden rounded-full bg-slate-100">

                <div class="h-full w-3/4 rounded-full bg-cyan-500"></div>

            </div>

            <p class="mt-3 text-xs font-medium text-slate-400">
                Company products
            </p>

        </div>



        {{-- Projects --}}
        <div class="group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-sm font-medium text-slate-500">
                        Projects
                    </p>

                    <h2 class="mt-3 text-3xl font-black text-slate-900">
                        {{ $stats['projects'] }}
                    </h2>

                </div>

                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-slate-100 text-xl text-slate-700">
                    ◈
                </div>

            </div>

            <div class="mt-5 h-1.5 overflow-hidden rounded-full bg-slate-100">

                <div class="h-full w-3/4 rounded-full bg-slate-900"></div>

            </div>

            <p class="mt-3 text-xs font-medium text-slate-400">
                Completed projects
            </p>

        </div>

    </div>

</div>



{{-- =========================================================
     QUICK ACTIONS
========================================================== --}}
<div class="rounded-3xl border border-slate-200 bg-white p-7 shadow-sm">

    <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-center">

        <div>

            <p class="text-xs font-bold uppercase tracking-[0.2em] text-blue-600">
                Quick Actions
            </p>

            <h2 class="mt-1 text-xl font-black text-slate-900">
                Manage your content
            </h2>

            <p class="mt-1 text-sm text-slate-500">
                Quickly create new website content.
            </p>

        </div>

    </div>


    <div class="mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">


        {{-- Add Page --}}
        <a href="{{ route('admin.pages.create') }}"
           class="group flex items-center justify-between rounded-2xl border border-slate-200 p-5 transition hover:border-blue-200 hover:bg-blue-50">

            <div class="flex items-center gap-4">

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-blue-600 text-lg font-bold text-white">
                    +
                </div>

                <div>

                    <p class="font-bold text-slate-900">
                        Add Page
                    </p>

                    <p class="mt-1 text-xs text-slate-500">
                        Create website page
                    </p>

                </div>

            </div>

            <span class="text-xl text-slate-300 transition group-hover:translate-x-1 group-hover:text-blue-600">
                →
            </span>

        </a>



        {{-- Add Service --}}
        <a href="{{ route('admin.services.create') }}"
           class="group flex items-center justify-between rounded-2xl border border-slate-200 p-5 transition hover:border-indigo-200 hover:bg-indigo-50">

            <div class="flex items-center gap-4">

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-indigo-600 text-lg font-bold text-white">
                    +
                </div>

                <div>

                    <p class="font-bold text-slate-900">
                        Add Service
                    </p>

                    <p class="mt-1 text-xs text-slate-500">
                        Create new service
                    </p>

                </div>

            </div>

            <span class="text-xl text-slate-300 transition group-hover:translate-x-1 group-hover:text-indigo-600">
                →
            </span>

        </a>



        {{-- Add Product --}}
        <a href="{{ route('admin.products.create') }}"
           class="group flex items-center justify-between rounded-2xl border border-slate-200 p-5 transition hover:border-cyan-200 hover:bg-cyan-50">

            <div class="flex items-center gap-4">

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-cyan-600 text-lg font-bold text-white">
                    +
                </div>

                <div>

                    <p class="font-bold text-slate-900">
                        Add Product
                    </p>

                    <p class="mt-1 text-xs text-slate-500">
                        Create new product
                    </p>

                </div>

            </div>

            <span class="text-xl text-slate-300 transition group-hover:translate-x-1 group-hover:text-cyan-600">
                →
            </span>

        </a>

    </div>

</div>



{{-- =========================================================
     RECENT ACTIVITY
========================================================== --}}
<div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

    <div class="flex items-center justify-between border-b border-slate-200 px-7 py-6">

        <div>

            <p class="text-xs font-bold uppercase tracking-[0.2em] text-blue-600">
                Activity
            </p>

            <h2 class="mt-1 text-xl font-black text-slate-900">
                Recent Activity
            </h2>

        </div>

        <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-500">
            Latest
        </span>

    </div>


    <div class="px-7 py-10">

        <div class="flex flex-col items-center justify-center text-center">

            <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-slate-100 text-2xl text-slate-400">
                ◷
            </div>

            <h3 class="mt-5 font-bold text-slate-800">
                No recent activity
            </h3>

            <p class="mt-2 max-w-md text-sm leading-6 text-slate-500">
                Your latest content updates, changes and
                administrative activities will appear here.
            </p>

        </div>

    </div>

</div>


</div>

@endsection


