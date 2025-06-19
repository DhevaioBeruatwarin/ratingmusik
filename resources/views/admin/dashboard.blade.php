<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-indigo-800 flex items-center gap-2">
            <svg class="w-7 h-7 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8.25V6.75A2.25 2.25 0 015.25 4.5h13.5A2.25 2.25 0 0121 6.75v1.5M3 8.25v8.25A2.25 2.25 0 005.25 18.75h13.5A2.25 2.25 0 0021 16.5V8.25M3 8.25h18" />
            </svg>
            Admin Dashboard
        </h2>
    </x-slot>

    <div class="py-12 min-h-screen bg-gradient-to-br from-indigo-100 via-white to-pink-100">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/90 shadow-xl rounded-2xl border border-indigo-100 p-8">
                <h3 class="text-lg font-semibold mb-4 text-indigo-700">Selamat datang, Admin!</h3>
                <p class="text-gray-600 mb-4">Ini adalah halaman khusus admin. Kamu bisa mengatur data musik, melihat rating, atau mengelola pengguna dari sini.</p>
                <a href="{{ route('admin.music.index') }}"
                   class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-4 py-2 rounded shadow transition">
                    Kelola Musik 🎵
                </a>

                <!-- Daftar Musik -->
                <h3 class="text-lg font-semibold mb-2 mt-8">Daftar Semua Musik</h3>
                <table class="w-full border rounded-lg overflow-hidden mb-8">
                    <thead class="bg-indigo-100">
                        <tr>
                            <th class="px-4 py-2 border">Judul</th>
                            <th class="px-4 py-2 border">Artis</th>
                            <th class="px-4 py-2 border">Genre</th>
                            <th class="px-4 py-2 border">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($musics as $music)
                        <tr>
                            <td class="px-4 py-2 border">{{ $music->title }}</td>
                            <td class="px-4 py-2 border">{{ $music->artist }}</td>
                            <td class="px-4 py-2 border">{{ $music->genre }}</td>
                            <td class="px-4 py-2 border flex gap-2">
                                <a href="{{ route('admin.music.edit', $music->id) }}" class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded transition">Edit</a>
                                <form action="{{ route('admin.music.destroy', $music->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus musik ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white px-3 py-1 rounded transition">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Daftar Review -->
                <h3 class="text-lg font-semibold mb-2 mt-8">Daftar Semua Review</h3>
                <table class="w-full border rounded-lg overflow-hidden">
                    <thead class="bg-indigo-100">
                        <tr>
                            <th class="px-4 py-2 border">Nama</th>
                            <th class="px-4 py-2 border">Judul Lagu</th>
                            <th class="px-4 py-2 border">Rating</th>
                            <th class="px-4 py-2 border">Komentar</th>
                            <th class="px-4 py-2 border">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reviews as $review)
                        <tr>
                            <td class="px-4 py-2 border">{{ $review->name }}</td>
                            <td class="px-4 py-2 border">{{ $review->music ? $review->music->title : '-' }}</td>
                            <td class="px-4 py-2 border">{{ $review->rating }}</td>
                            <td class="px-4 py-2 border">{{ $review->comment }}</td>
                            <td class="px-4 py-2 border">
                                <form action="{{ route('admin.reviews.destroy', $review->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus review ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white px-3 py-1 rounded transition">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
