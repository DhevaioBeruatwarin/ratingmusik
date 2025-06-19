<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-indigo-800 flex items-center gap-2">
            <svg class="w-7 h-7 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19V6.75A2.25 2.25 0 0111.25 4.5h1.5A2.25 2.25 0 0115 6.75V19" />
            </svg>
            Detail Musik
        </h2>
    </x-slot>
    <div class="dashboard-container" style="max-width:600px;margin:40px auto;background:rgba(255,255,255,0.95);border-radius:20px;box-shadow:0 8px 32px 0 rgba(31,38,135,0.15);padding:40px 32px;border:1px solid #e0e7ff;">
        <p><strong>Judul:</strong> {{ $music->title }}</p>
        <p><strong>Artis:</strong> {{ $music->artist }}</p>
        <p><strong>Genre:</strong> {{ $music->genre }}</p>
        <div style="margin:18px 0;">
            <a href="{{ route('dashboard') }}" style="background:#e0e7ff;color:#3730a3;padding:6px 18px;border-radius:6px;text-decoration:none;font-weight:500;margin-right:8px;">Kembali ke Dashboard</a>
        </div>
        <hr style="margin:32px 0;">
        <h2 style="font-size:1.2rem;font-weight:600;margin-bottom:16px;">Reviews</h2>
        @if($music->reviews->count())
            <div style="margin-bottom:24px;">
                @foreach($music->reviews as $review)
                    <div style="border:1px solid #e5e7eb;border-radius:8px;padding:16px;margin-bottom:12px;background:#f9fafb;">
                        <strong>{{ $review->name }}</strong>
                        <span style="color:#f59e42;">@for($i=0;$i<$review->rating;$i++)★@endfor</span>
                        <div style="margin-top:6px;">{{ $review->comment }}</div>
                    </div>
                @endforeach
            </div>
        @else
            <p style="color:#6b7280;">Belum ada review.</p>
        @endif

        @auth
        <div style="margin-top:32px;">
            <h3 style="font-size:1.1rem;font-weight:600;margin-bottom:10px;">Beri Review</h3>
            <form action="{{ route('reviews.store') }}" method="POST">
                @csrf
                <div style="margin-bottom:12px;">
                    <label for="name" style="font-weight:600;">Nama:</label>
                    <input type="text" name="name" id="name" required style="width:100%;padding:8px;border-radius:6px;border:1px solid #e5e7eb;">
                </div>
                <div style="margin-bottom:12px;">
                    <label for="rating" style="font-weight:600;">Rating:</label>
                    <select name="rating" id="rating" required style="width:100%;padding:8px;border-radius:6px;border:1px solid #e5e7eb;">
                        <option value="">Pilih rating</option>
                        @for($i=1;$i<=5;$i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div style="margin-bottom:12px;">
                    <label for="comment" style="font-weight:600;">Komentar:</label>
                    <textarea name="comment" id="comment" rows="3" style="width:100%;padding:8px;border-radius:6px;border:1px solid #e5e7eb;"></textarea>
                </div>
                <input type="hidden" name="music_id" value="{{ $music->id }}">
                <button type="submit" style="background:#6366f1;color:#fff;padding:10px 28px;border-radius:8px;font-weight:600;border:none;">Kirim Review</button>
            </form>
        </div>
        @endauth
    </div>
</x-app-layout>