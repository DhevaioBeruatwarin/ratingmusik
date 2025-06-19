<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Musik
        </h2>
    </x-slot>

    <div class="container" style="max-width:600px;margin:40px auto;background:#fff;border-radius:16px;box-shadow:0 4px 16px #e0e7ff;padding:32px;">
        <form action="{{ route('admin.music.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Judul</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="artist" class="form-label">Artis</label>
                <input type="text" name="artist" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="genre" class="form-label">Genre</label>
                <input type="text" name="genre" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
</x-app-layout>
