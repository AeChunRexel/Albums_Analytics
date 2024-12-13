<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-100 dark:bg-gray-900">

        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-8 w-full max-w-md">
            <!-- Logo -->
            <div class="flex justify-center mb-6">
                <img src="/images/album.png" class="h-24 w-auto" alt="Album Analytics">
            </div>

            <!-- Title -->
            <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 text-center mb-6">
                Register for Album Analytics
            </h2>

            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input 
                        id="name" 
                        class="block mt-1 w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-gray-500 focus:border-gray-500 dark:bg-gray-700 dark:text-white" 
                        type="text" 
                        name="name" 
                        :value="old('name')" 
                        required 
                        autofocus 
                        autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

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
                        autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input 
                        id="password_confirmation" 
                        class="block mt-1 w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-gray-500 focus:border-gray-500 dark:bg-gray-700 dark:text-white" 
                        type="password" 
                        name="password_confirmation" 
                        required 
                        autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- Submit Button -->
                <div class="flex items-center justify-between">
                    <x-primary-button class="w-full bg-gray-600 flex justify-center hover:bg-gray-700 text-white font-medium py-2 rounded-md shadow-md transition duration-300">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>

                <!-- Link to Login -->
                <div class="flex items-center justify-between">
                    <a 
                        href="{{ route('login') }}" 
                        class="text-sm text-gray-600 hover:text-gray-800 dark:text-gray-400 dark:hover:text-gray-500">
                        {{ __('Already registered?') }}
                    </a>
                </div>

            </form>
        </div>
    </div>
</x-guest-layout>
