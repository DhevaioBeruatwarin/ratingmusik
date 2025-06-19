<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">Selamat datang, Admin!</h3>
                <p class="text-gray-600 mb-4">Ini adalah halaman khusus admin. Kamu bisa mengatur data musik, melihat rating, atau mengelola pengguna dari sini.</p>

                <!-- Tombol CRUD Musik -->
                <a href="{{ route('admin.music.index') }}"
                   class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-4 py-2 rounded">
                    <span style="color: black;">Kelola Musik 🎵</span>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
