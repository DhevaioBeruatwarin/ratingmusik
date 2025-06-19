@php($title = 'Register')

<x-guest-layout>
    <h2 class="text-2xl font-bold text-center mb-6">Register</h2>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="mb-4">
            <input
                id="name"
                name="name"
                type="text"
                placeholder="Full Name"
                :value="old('name')"
                required
                class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400"
            />
            <x-input-error :messages="$errors->get('name')" class="mt-1 text-sm text-red-500" />
        </div>

        <!-- Username -->
        <div class="mb-4">
            <input
                id="username"
                name="username"
                type="text"
                placeholder="Username"
                :value="old('username')"
                required
                class="w-full px-4 py-2 border border-blue-400 rounded focus:outline-none focus:ring-2 focus:ring-blue-400"
            />
            <x-input-error :messages="$errors->get('username')" class="mt-1 text-sm text-red-500" />
        </div>

        <!-- Password -->
        <div class="mb-4">
            <input
                id="password"
                name="password"
                type="password"
                placeholder="Password"
                required
                class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400"
            />
            <x-input-error :messages="$errors->get('password')" class="mt-1 text-sm text-red-500" />
        </div>

        <!-- Confirm Password -->
        <div class="mb-4">
            <input
                id="password_confirmation"
                name="password_confirmation"
                type="password"
                placeholder="Confirm Password"
                required
                class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400"
            />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-sm text-red-500" />
        </div>

        <!-- Link ke Login -->
        <div class="flex items-center justify-between">
            <a class="text-sm text-blue-600 hover:underline" href="{{ route('login') }}">
                Already registered?
            </a>

            <x-primary-button class="bg-red-500 hover:bg-red-600">
                Register
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
