<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Company CMS') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            body {
                font-family: 'Plus Jakarta Sans', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased bg-slate-50">
        <div class="min-h-screen flex flex-col lg:flex-row">
            
            <!-- Left Side: Aesthetic brand section -->
            <div class="hidden lg:flex lg:w-1/2 bg-slate-900 relative items-center justify-center overflow-hidden">
                <!-- Background decorative elements -->
                <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(120,119,198,0.2),transparent)]"></div>
                <div class="absolute -top-40 -left-40 w-96 h-96 bg-indigo-500/10 rounded-full blur-3xl"></div>
                <div class="absolute -bottom-40 -right-40 w-96 h-96 bg-violet-500/10 rounded-full blur-3xl"></div>

                <div class="relative z-10 p-12 max-w-lg text-white">
                    <div class="flex items-center gap-3 mb-8">
                        <span class="p-3 bg-indigo-600 rounded-2xl shadow-lg shadow-indigo-600/30 text-white font-bold text-2xl tracking-wider">
                            CC
                        </span>
                        <span class="text-xl font-bold tracking-tight text-white">
                            Company CMS
                        </span>
                    </div>
                    
                    <h2 class="text-4xl font-extrabold tracking-tight leading-tight text-white mb-6">
                        Manage your digital presence with absolute control.
                    </h2>
                    
                    <p class="text-lg text-slate-300 mb-8">
                        A robust, lightweight and customizable content management system built specifically for modern websites.
                    </p>

                    <div class="space-y-4">
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            <span class="text-slate-300 font-medium">Intuitive page & layout builder</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            <span class="text-slate-300 font-medium">Integrated media & post management</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            <span class="text-slate-300 font-medium">Real-time statistics & user settings</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side: Form container -->
            <div class="flex-1 flex items-center justify-center p-8 sm:p-12 lg:p-16">
                <div class="w-full max-w-md space-y-8">
                    <!-- Mobile logo display -->
                    <div class="lg:hidden flex items-center gap-3 mb-6">
                        <span class="p-2.5 bg-indigo-600 rounded-xl text-white font-bold text-lg">
                            CC
                        </span>
                        <span class="text-lg font-bold tracking-tight text-slate-900">
                            Company CMS
                        </span>
                    </div>

                    <div class="bg-white rounded-3xl border border-slate-100 shadow-xl shadow-slate-100/50 p-8 sm:p-10">
                        {{ $slot }}
                    </div>
                </div>
            </div>

        </div>
    </body>
</html>
