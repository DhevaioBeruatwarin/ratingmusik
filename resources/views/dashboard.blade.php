@section('styles')
<style>
    body {
        background: linear-gradient(135deg, #c3dafe 0%, #fbc2eb 100%);
        min-height: 100vh;
        font-family: 'Segoe UI', Arial, sans-serif;
    }
    .dashboard-container {
        max-width: 600px;
        margin: 20px auto;
        background: rgba(255,255,255,0.95);
        border-radius: 20px;
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.15);
        padding: 40px 32px;
        border: 1px solid #e0e7ff;
    }
    .dashboard-header {
        display: flex;
        align-items: center;
        gap: 12px;
        font-size: 2rem;
        color: #3730a3;
        font-weight: 600;
        margin-bottom: 24px;
    }
    .admin-box {
        background: linear-gradient(90deg, #fef9c3 0%, #fef3c7 100%);
        border: 1px solid #fde68a;
        border-radius: 14px;
        padding: 24px 20px;
        margin-top: 24px;
        box-shadow: 0 2px 8px 0 #fde68a44;
    }
    .admin-btn {
        display: inline-block;
        margin-top: 18px;
        background: #6366f1;
        color: #fff;
        font-weight: 600;
        padding: 10px 28px;
        border-radius: 8px;
        box-shadow: 0 2px 8px 0 #6366f144;
        text-decoration: none;
        transition: background 0.2s, box-shadow 0.2s;
    }
    .admin-btn:hover {
        background: #4338ca;
        box-shadow: 0 4px 16px 0 #6366f188;
    }
</style>
@endsection

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-indigo-800 flex items-center gap-2">
            <svg class="w-7 h-7 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8.25V6.75A2.25 2.25 0 015.25 4.5h13.5A2.25 2.25 0 0121 6.75v1.5M3 8.25v8.25A2.25 2.25 0 005.25 18.75h13.5A2.25 2.25 0 0021 16.5V8.25M3 8.25h18" />
            </svg>
            Dashboard
        </h2>
    </x-slot>

    <div class="max-w-2xl mx-auto">
        <div class="bg-white/90 shadow-xl rounded-2xl border border-indigo-100 p-8 mt-2">
            <div class="flex items-center gap-3 mb-4">
                <svg class="w-8 h-8 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 19.5a7.5 7.5 0 0115 0v.75A2.25 2.25 0 0117.25 22.5H6.75A2.25 2.25 0 014.5 20.25V19.5z" />
                </svg>
                <span class="text-lg font-semibold">You're logged in!</span>
            </div>
            @if(Auth::user() && Auth::user()->role === 'admin')
                <div class="flex justify-end mb-4">
                    <a href="{{ route('admin.music.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-4 py-2 rounded shadow transition">
                        + Tambah Musik
                    </a>
                </div>
                <div class="mt-4">
                    <h3 class="text-lg font-semibold mb-4">Daftar Musik</h3>
                    @if(isset($musics) && count($musics) > 0)
                        <table class="w-full border rounded-lg overflow-hidden">
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
                    @else
                        <p class="text-gray-600">Belum ada data musik.</p>
                    @endif
                </div>
            @elseif(Auth::user() && Auth::user()->role !== 'admin')
                <div class="mt-8">
                    <h3 class="text-lg font-semibold mb-4">Daftar Musik</h3>
                    @if(isset($musics) && count($musics) > 0)
                        <table class="w-full border rounded-lg overflow-hidden">
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
                                    <td class="px-4 py-2 border">
                                        <a href="{{ route('reviews.create', ['music' => $music->id]) }}"
                                           class="bg-indigo-500 hover:bg-indigo-700 text-white px-3 py-1 rounded transition">Review</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-gray-600">Belum ada data musik.</p>
                    @endif
                </div>
            @endif
        </div>
<<<<<<< Updated upstream
        @if(Auth::user() && Auth::user()->role === 'admin')
            <div class="admin-box">
                <span style="font-weight:600;color:#b45309;font-size:1.1rem;display:flex;align-items:center;gap:8px;">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="24" height="24" style="color:#f59e42;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 6.75v4.5l3.75 2.25" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3.75c-4.556 0-8.25 3.694-8.25 8.25s3.694 8.25 8.25 8.25 8.25-3.694 8.25-8.25-3.694-8.25-8.25-8.25z" />
                    </svg>
                    Anda login sebagai Admin
                </span>
                <span style="color:#92400e;">Akses fitur khusus admin untuk mengelola musik dan data aplikasi.</span>
                <a href="{{ route('admin.dashboard') }}" class="admin-btn">
                    Masuk ke Dashboard Admin
                </a>
            </div>
        @endif
        @if(Auth::user() && Auth::user()->role !== 'admin')
            <div style="margin-top:32px;">
                <h3 style="font-size:1.2rem;font-weight:600;margin-bottom:16px;">Daftar Musik</h3>
                @if(isset($musics) && count($musics) > 0)
                    <table style="width:100%;border-collapse:collapse;background:#f9fafb;border-radius:12px;overflow:hidden;">
                        <thead style="background:#e0e7ff;">
                            <tr>
                                <th style="padding:10px 8px;border:1px solid #e5e7eb;">Judul</th>
                                <th style="padding:10px 8px;border:1px solid #e5e7eb;">Artis</th>
                                <th style="padding:10px 8px;border:1px solid #e5e7eb;">Genre</th>
                                <th style="padding:10px 8px;border:1px solid #e5e7eb;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($musics as $music)
                            <tr>
                                <td style="padding:8px;border:1px solid #e5e7eb;">{{ $music->title }}</td>
                                <td style="padding:8px;border:1px solid #e5e7eb;">{{ $music->artist }}</td>
                                <td style="padding:8px;border:1px solid #e5e7eb;">{{ $music->genre }}</td>
                                <td style="padding:8px;border:1px solid #e5e7eb;display:flex;gap:8px;">
                                    <a href="{{ route('reviews.create', ['music' => $music->id]) }}" style="background:#6366f1;color:#fff;padding:6px 16px;border-radius:6px;text-decoration:none;font-weight:500;">Review</a>
                                    <a href="{{ route('music.show', $music->id) }}" style="background:#f59e42;color:#fff;padding:6px 16px;border-radius:6px;text-decoration:none;font-weight:500;">Lihat Reviews</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p style="color:#6b7280;">Belum ada data musik.</p>
                @endif
            </div>
        @endif
=======
>>>>>>> Stashed changes
    </div>
</x-app-layout>
