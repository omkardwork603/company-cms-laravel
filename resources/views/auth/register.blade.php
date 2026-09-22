<x-guest-layout>
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-slate-900">
            Create Account
        </h2>
        <p class="text-sm text-slate-500 mt-1">
            Get started with Company CMS in just a few steps.
        </p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <!-- Name -->
        <div>
            <label for="name" class="block text-sm font-semibold text-slate-700 mb-1.5">
                Full Name
            </label>
            <input id="name" 
                   class="block w-full px-4 py-3 rounded-xl border border-slate-200 text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-colors duration-200" 
                   type="text" 
                   name="name" 
                   value="{{ old('name') }}" 
                   placeholder="John Doe"
                   required 
                   autofocus 
                   autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-1.5 text-xs text-red-600" />
        </div>

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-sm font-semibold text-slate-700 mb-1.5">
                Email Address
            </label>
            <input id="email" 
                   class="block w-full px-4 py-3 rounded-xl border border-slate-200 text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-colors duration-200" 
                   type="email" 
                   name="email" 
                   value="{{ old('email') }}" 
                   placeholder="john@example.com"
                   required 
                   autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-1.5 text-xs text-red-600" />
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-sm font-semibold text-slate-700 mb-1.5">
                Password
            </label>
            <input id="password" 
                   class="block w-full px-4 py-3 rounded-xl border border-slate-200 text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-colors duration-200" 
                   type="password" 
                   name="password" 
                   placeholder="••••••••"
                   required 
                   autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-1.5 text-xs text-red-600" />
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation" class="block text-sm font-semibold text-slate-700 mb-1.5">
                Confirm Password
            </label>
            <input id="password_confirmation" 
                   class="block w-full px-4 py-3 rounded-xl border border-slate-200 text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-colors duration-200" 
                   type="password" 
                   name="password_confirmation" 
                   placeholder="••••••••"
                   required 
                   autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1.5 text-xs text-red-600" />
        </div>

        <!-- Submit Button -->
        <div class="pt-2">
            <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-xl shadow-md text-sm font-semibold text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200">
                Register
            </button>
        </div>
    </form>

    <div class="mt-6 pt-6 border-t border-slate-100 text-center">
        <p class="text-sm text-slate-500">
            Already registered? 
            <a href="{{ route('login') }}" class="font-semibold text-indigo-600 hover:text-indigo-700 transition-colors">
                Sign in instead
            </a>
        </p>
    </div>
</x-guest-layout>
