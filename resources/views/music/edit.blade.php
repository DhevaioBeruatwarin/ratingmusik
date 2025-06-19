--- resources/views/music/edit.blade.php ---
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-indigo-800 flex items-center gap-2">
            <svg class="w-7 h-7 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            Edit Musik
        </h2>
    </x-slot>
    <div class="dashboard-container" style="max-width:600px;margin:40px auto;background:rgba(255,255,255,0.95);border-radius:20px;box-shadow:0 8px 32px 0 rgba(31,38,135,0.15);padding:40px 32px;border:1px solid #e0e7ff;">
        <form action="{{ route('admin.music.update', $music->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div style="margin-bottom:18px;">
                <label for="title" style="font-weight:600;">Judul</label>
                <input type="text" name="title" id="title" value="{{ $music->title }}" required style="width:100%;padding:8px;border-radius:6px;border:1px solid #e5e7eb;">
            </div>
            <div style="margin-bottom:18px;">
                <label for="artist" style="font-weight:600;">Artis</label>
                <input type="text" name="artist" id="artist" value="{{ $music->artist }}" required style="width:100%;padding:8px;border-radius:6px;border:1px solid #e5e7eb;">
            </div>
            <div style="margin-bottom:18px;">
                <label for="genre" style="font-weight:600;">Genre</label>
                <input type="text" name="genre" id="genre" value="{{ $music->genre }}" required style="width:100%;padding:8px;border-radius:6px;border:1px solid #e5e7eb;">
            </div>
            <button type="submit" style="background:#6366f1;color:#fff;padding:10px 28px;border-radius:8px;font-weight:600;border:none;">Update</button>
        </form>
    </div>
</x-app-layout>
