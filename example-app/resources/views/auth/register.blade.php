
<x-guest-layout>
    <div class="min-h-screen bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 bg-white shadow-2xl rounded-xl p-10 border border-gray-100">
            <x-auth-card>
                <div class="text-center">
                    <x-slot name="logo" class="flex justify-center mb-6">
                        <a href="/" class="inline-block">
                            <x-application-logo class="w-20 h-20 fill-current text-indigo-600 transform hover:scale-110 transition duration-300" />
                        </a>
                    </x-slot>

                    <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                        {{ __('Create Your Account') }}
                    </h2>
                    <p class="mt-2 text-center text-sm text-gray-600">
                        {{ __('Or') }} 
                        <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                            {{ __('sign in to your existing account') }}
                        </a>
                    </p>
                </div>

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4 text-red-600 text-center" :errors="$errors" />

                <form method="POST" action="{{ route('register') }}" class="mt-8 space-y-6">
                    @csrf

                    <!-- Name -->
                    <div>
                        <x-label for="name" :value="__('Name')" class="block text-sm font-medium text-gray-700" />

                        <x-input 
                            id="name" 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                            type="text" 
                            name="name" 
                            :value="old('name')" 
                            required 
                            autofocus 
                        />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-label for="email" :value="__('Email')" class="block text-sm font-medium text-gray-700" />

                        <x-input 
                            id="email" 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                            type="email" 
                            name="email" 
                            :value="old('email')" 
                            required 
                        />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-label for="password" :value="__('Password')" class="block text-sm font-medium text-gray-700" />

                        <x-input 
                            id="password" 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            type="password"
                            name="password"
                            required 
                            autocomplete="new-password" 
                        />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-label for="password_confirmation" :value="__('Confirm Password')" class="block text-sm font-medium text-gray-700" />

                        <x-input 
                            id="password_confirmation" 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            type="password"
                            name="password_confirmation" 
                            required 
                        />
                    </div>

                    <div class="mt-6">
                        <x-button class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Register') }}
                        </x-button>
                    </div>
                </form>
            </x-auth-card>
        </div>
    </div>
</x-guest-layout>
