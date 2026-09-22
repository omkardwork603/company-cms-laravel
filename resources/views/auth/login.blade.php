<x-guest-layout>
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-slate-900">
            Welcome Back
        </h2>
        <p class="text-sm text-slate-500 mt-1">
            Please sign in to access your administrative dashboard.
        </p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-sm font-semibold text-slate-700 mb-1.5">
                Email Address
            </label>
            <div class="relative">
                <input id="email" 
                       class="block w-full px-4 py-3 rounded-xl border border-slate-200 text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-colors duration-200" 
                       type="email" 
                       name="email" 
                       value="{{ old('email') }}" 
                       placeholder="you@example.com"
                       required 
                       autofocus 
                       autocomplete="username" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-1.5 text-xs text-red-600" />
        </div>

        <!-- Password -->
        <div>
            <div class="flex justify-between items-center mb-1.5">
                <label for="password" class="block text-sm font-semibold text-slate-700">
                    Password
                </label>
                @if (Route::has('password.request'))
                    <a class="text-xs font-semibold text-indigo-600 hover:text-indigo-700 transition-colors" href="{{ route('password.request') }}">
                        Forgot Password?
                    </a>
                @endif
            </div>
            <div class="relative">
                <input id="password" 
                       class="block w-full px-4 py-3 rounded-xl border border-slate-200 text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-colors duration-200" 
                       type="password" 
                       name="password" 
                       placeholder="••••••••"
                       required 
                       autocomplete="current-password" />
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-1.5 text-xs text-red-600" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center">
            <input id="remember_me" 
                   type="checkbox" 
                   class="h-4 w-4 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500/20 focus:outline-none" 
                   name="remember">
            <label for="remember_me" class="ml-2 text-sm text-slate-600 font-medium">
                Keep me signed in
            </label>
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-xl shadow-md text-sm font-semibold text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200">
                Sign In
            </button>
        </div>
    </form>

    {{-- <div class="mt-6 pt-6 border-t border-slate-100 text-center">
        <p class="text-sm text-slate-500">
            Don't have an account? 
            <a href="{{ route('register') }}" class="font-semibold text-indigo-600 hover:text-indigo-700 transition-colors">
                Create one now
            </a>
        </p>
    </div> --}}
</x-guest-layout>
