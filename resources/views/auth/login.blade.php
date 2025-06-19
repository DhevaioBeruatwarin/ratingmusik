@php($title = 'Login')

<x-guest-layout>
        <h2 class="text-2xl font-bold text-center mb-6">Login</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Username -->
        <div class="mb-4">
            <input
                id="username"
                type="text"
                name="username"
                :value="old('username')"
                required autofocus
                placeholder="Username"
                class="w-full px-4 py-2 border border-blue-400 rounded focus:outline-none focus:ring-2 focus:ring-blue-400"
            />
            <x-input-error :messages="$errors->get('username')" class="mt-1 text-sm text-red-500" />
        </div>

        <!-- Password -->
        <div class="mb-4">
            <input
                id="password"
                type="password"
                name="password"
                required
                placeholder="Password"
                class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400"
            />
            <x-input-error :messages="$errors->get('password')" class="mt-1 text-sm text-red-500" />
        </div>

        <!-- Submit -->
        <div class="mb-4">
            <button
                type="submit"
                class="w-full bg-red-500 hover:bg-red-600 text-white py-2 rounded font-semibold"
            >
                Sign in
            </button>
        </div>

        <!-- Link ke Register -->
        <div class="text-center text-sm">
            <p class="text-gray-600">
                Don't have an account?
                <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Register</a>
            </p>
        </div>
    </form>
</x-guest-layout>
