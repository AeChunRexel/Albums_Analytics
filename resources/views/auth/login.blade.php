<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-100 dark:bg-gray-900">

        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-8 w-full max-w-md">
            <!-- Logo -->
            <div class="flex justify-center mb-6">
                <img src="/images/album.png" class="h-24 w-auto" alt="Album Analytics">
            </div>
            <!-- Title -->
            <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 text-center mb-6">
                Login to Album Analytics
            </h2>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input 
                        id="email" 
                        class="block mt-1 w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-gray-500 focus:border-gray-500 dark:bg-gray-700 dark:text-white" 
                        type="email" 
                        name="email" 
                        :value="old('email')" 
                        required 
                        autofocus 
                        autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input 
                        id="password" 
                        class="block mt-1 w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-gray-500 focus:border-gray-500 dark:bg-gray-700 dark:text-white" 
                        type="password" 
                        name="password" 
                        required 
                        autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <label for="remember_me" class="inline-flex items-center text-gray-600 dark:text-gray-300">
                        <input 
                            id="remember_me" 
                            type="checkbox" 
                            class="rounded border-gray-300 text-gray-600 dark:text-gray-400 shadow-sm focus:ring-gray-500" 
                            name="remember">
                        <span class="ml-2 text-sm">{{ __('Remember me') }}</span>
                    </label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" 
                           class="text-sm text-gray-600 hover:text-gray-800 dark:text-gray-400 dark:hover:text-gray-500">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>

                <!-- Submit Button -->
                <div>
                    <x-primary-button 
                        class="w-full bg-gray-600 flex justify-center hover:bg-gray-700 text-white font-medium py-2 rounded-md shadow-md transition duration-300">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
