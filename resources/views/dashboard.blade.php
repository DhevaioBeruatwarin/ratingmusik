@section('styles')
<style>
    body {
        background: linear-gradient(135deg, #c3dafe 0%, #fbc2eb 100%);
        min-height: 100vh;
        font-family: 'Segoe UI', Arial, sans-serif;
    }
    .dashboard-container {
        max-width: 600px;
        margin: 40px auto;
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
        <div class="dashboard-header">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="36" height="36">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8.25V6.75A2.25 2.25 0 015.25 4.5h13.5A2.25 2.25 0 0121 6.75v1.5M3 8.25v8.25A2.25 2.25 0 005.25 18.75h13.5A2.25 2.25 0 0021 16.5V8.25M3 8.25h18" />
            </svg>
            {{ __('Dashboard') }}
        </div>
    </x-slot>

    <div class="dashboard-container">
        <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 18px;">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="30" height="30" style="color:#6366f1;">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 19.5a7.5 7.5 0 0115 0v.75A2.25 2.25 0 0117.25 22.5H6.75A2.25 2.25 0 014.5 20.25V19.5z" />
            </svg>
            <span style="font-size:1.1rem;font-weight:500;">{{ __("You're logged in!") }}</span>
        </div>
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
                                <td style="padding:8px;border:1px solid #e5e7eb;">
                                    <a href="{{ route('reviews.create', ['music' => $music->id]) }}" style="background:#6366f1;color:#fff;padding:6px 16px;border-radius:6px;text-decoration:none;font-weight:500;">Review</a>
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
    </div>
</x-app-layout>
