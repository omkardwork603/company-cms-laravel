<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Admin Panel')
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100 text-slate-900 antialiased">

<div class="min-h-screen flex">

    {{-- =========================================================
         SIDEBAR
    ========================================================== --}}
    <aside class="w-72 bg-[#06111f] text-white min-h-screen shadow-2xl">

        {{-- Logo & Brand --}}
        <div class="px-6 py-7 border-b border-white/10">

            <a href="{{ route('home') }}" target="_blank" title="Visit Main Website" class="flex items-center gap-3 group">

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-gradient-to-tr from-blue-600 to-indigo-500 text-lg font-black text-white shadow-md shadow-blue-500/20 group-hover:scale-105 transition-transform">
                    🏠
                </div>

                <div>
                    <h1 class="text-lg font-black tracking-tight group-hover:text-blue-400 transition-colors flex items-center gap-1">
                        Company CMS
                        <span class="text-xs font-normal text-slate-400">↗</span>
                    </h1>

                    <p class="mt-0.5 text-xs text-slate-400">
                        Admin Panel
                    </p>
                </div>

            </a>

        </div>


        {{-- Navigation --}}
        <nav class="px-4 py-6">

             {{-- Main / Home Section 
             <p class="px-4 mb-3 text-[11px] font-bold uppercase tracking-[0.2em] text-slate-500">
                Home & Public Access
            </p> 

             Home Page (Main Public Site) 
             <a href="{{ route('home') }}"
               target="_blank"
               class="group mb-3 flex items-center justify-between rounded-xl px-4 py-3 text-sm font-semibold bg-white/5 text-blue-400 hover:bg-blue-600 hover:text-white transition shadow-sm">

                <div class="flex items-center gap-3">
                    <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-blue-500/20 text-blue-300 group-hover:bg-white/20 group-hover:text-white transition-colors text-base">
                        🌐
                    </span>
                    <div class="flex flex-col">
                        <span>Main Home Page</span>
                        <span class="text-[10px] text-slate-400 group-hover:text-blue-100 font-normal">http://localhost:8000/</span>
                    </div>
                </div>

                <span class="text-[11px] bg-blue-500/20 text-blue-300 px-2 py-0.5 rounded-full group-hover:bg-white/20 group-hover:text-white transition">Visit ↗</span>
            </a>  --}}

             {{-- Dashboard Overview  --}}
             <a href="{{ route('admin.dashboard') }}"
               class="group mb-2 flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold transition
               {{ request()->routeIs('admin.dashboard')
                    ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/20'
                    : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">

                <span class="flex h-8 w-8 items-center justify-center rounded-lg
                    {{ request()->routeIs('admin.dashboard') ? 'bg-white/10' : 'bg-white/5' }}">
                    📊
                </span>

                Dashboard

            </a> 


            {{-- Content --}}
            <p class="px-4 mt-8 mb-3 text-[11px] font-bold uppercase tracking-[0.2em] text-slate-600">
                Content
            </p>


            <a href="{{ route('admin.pages.index') }}"
               class="group mb-1 flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium transition
               {{ request()->routeIs('admin.pages.index')
                    ? 'bg-blue-600 text-white'
                    : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">

                <span>▣</span>
                Pages

            </a>


            <a href="{{ route('admin.pages.about.edit') }}"
               class="group mb-1 flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium transition
               {{ request()->routeIs('admin.pages.about.edit')
                    ? 'bg-blue-600 text-white'
                    : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">

                <span>ℹ</span>
                About Us

            </a>


            <a href="{{ route('admin.services.index') }}"
               class="group mb-1 flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium transition
               {{ request()->routeIs('admin.services.*')
                    ? 'bg-blue-600 text-white'
                    : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">

                <span>◇</span>
                Services

            </a>


            <a href="{{ route('admin.products.index') }}"
               class="group mb-1 flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium transition
               {{ request()->routeIs('admin.products.*')
                    ? 'bg-blue-600 text-white'
                    : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">

                <span>□</span>
                Products

            </a>


            <a href="{{ route('admin.projects.index') }}"
               class="group mb-1 flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium transition
               {{ request()->routeIs('admin.projects.*')
                    ? 'bg-blue-600 text-white'
                    : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">

                <span>◈</span>
                Projects

            </a>


            <a href="{{ route('admin.team.index') }}"
               class="group mb-1 flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium transition
               {{ request()->routeIs('admin.team.*')
                    ? 'bg-blue-600 text-white'
                    : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">

                <span>♙</span>
                Team

            </a>


            <a href="{{ route('admin.posts.index') }}"
               class="group mb-1 flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium transition
               {{ request()->routeIs('admin.posts.*')
                    ? 'bg-blue-600 text-white'
                    : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">

                <span>✎</span>
                Blog

            </a>


            {{-- Communication --}}
            <p class="px-4 mt-8 mb-3 text-[11px] font-bold uppercase tracking-[0.2em] text-slate-600">
                Communication
            </p>


            <a href="{{ route('admin.messages.index') }}"
               class="group mb-1 flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium transition
               {{ request()->routeIs('admin.messages.*')
                    ? 'bg-blue-600 text-white'
                    : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">

                <span>✉</span>
                Messages

            </a>


            {{-- Management --}}
            <p class="px-4 mt-8 mb-3 text-[11px] font-bold uppercase tracking-[0.2em] text-slate-600">
                Management
            </p>


            <a href="{{ route('admin.media.index') }}"
               class="group mb-1 flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium transition
               {{ request()->routeIs('admin.media.*')
                    ? 'bg-blue-600 text-white'
                    : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">

                <span>▧</span>
                Media

            </a>


            <a href="{{ route('admin.menus.index') }}"
               class="group mb-1 flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium transition
               {{ request()->routeIs('admin.menus.*')
                    ? 'bg-blue-600 text-white'
                    : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">

                <span>☰</span>
                Menus

            </a>


            <a href="{{ route('admin.settings.index') }}"
               class="group mb-1 flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium transition
               {{ request()->routeIs('admin.settings.*')
                    ? 'bg-blue-600 text-white'
                    : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">

                <span>⚙</span>
                Settings

            </a>

        </nav>

    </aside>



    {{-- =========================================================
         MAIN AREA
    ========================================================== --}}
    <div class="flex-1 min-w-0">


        {{-- =====================================================
             HEADER
        ====================================================== --}}
        <header class="sticky top-0 z-40 border-b border-slate-200 bg-white/95 backdrop-blur">

            <div class="flex h-20 items-center justify-between px-8">


                {{-- Page Title --}}
                <div>

                    <p class="text-xs font-bold uppercase tracking-[0.2em] text-blue-600">
                        Admin
                    </p>

                    <h2 class="mt-1 text-xl font-black text-slate-900">

                        @yield('page-title', 'Dashboard')

                    </h2>

                </div>



                {{-- User Area --}}
                <div class="flex items-center gap-5">


                    {{-- Notification --}}
                    <button
                        type="button"
                        class="relative flex h-10 w-10 items-center justify-center rounded-xl border border-slate-200 text-slate-500 transition hover:bg-slate-50 hover:text-slate-900">

                        ♢

                        <span class="absolute right-2 top-2 h-2 w-2 rounded-full bg-blue-600"></span>

                    </button>



                    {{-- User --}}
                    <div class="flex items-center gap-3 border-l border-slate-200 pl-5">

                        <div class="flex h-10 w-10 items-center justify-center rounded-full bg-blue-600 font-bold text-white">

                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

                        </div>


                        <div class="hidden sm:block">

                            <p class="text-sm font-bold text-slate-800">

                                {{ auth()->user()->name }}

                            </p>

                            <p class="text-xs text-slate-400">

                                Administrator

                            </p>

                        </div>


                        <form method="POST"
                              action="{{ route('logout') }}">

                            @csrf

                            <button
                                type="submit"
                                class="ml-2 rounded-lg px-3 py-2 text-sm font-semibold text-red-500 transition hover:bg-red-50 hover:text-red-600">

                                Logout

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </header>



        {{-- =====================================================
             PAGE CONTENT
        ====================================================== --}}
        <main class="p-8">

            @yield('content')

        </main>


    </div>

</div>

</body>

</html>