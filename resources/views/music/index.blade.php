<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Musik') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('success') }}
                </div>
            @endif

            <div class="flex justify-end mb-4">
                <a href="{{ route('admin.music.create') }}"
                   class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"> <span style="color: black;">+ Tambah Musik</span>
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if ($musics->count())
                <table class="table-auto w-full border">
                    <thead class="bg-gray-100">
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
                            <td class="px-4 py-2 border">
                                <a href="{{ route('admin.music.edit', $music->id) }}"
                                   class="text-yellow-600 hover:underline mr-2">Edit</a>
                                <form action="{{ route('admin.music.destroy', $music->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600 hover:underline" onclick="return confirm('Yakin?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                    <p class="text-gray-600">Belum ada data musik.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
