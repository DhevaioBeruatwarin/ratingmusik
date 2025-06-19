<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Beri Review Musik
        </h2>
    </x-slot>
    <div class="container" style="max-width:500px;margin:40px auto;background:#fff;border-radius:16px;box-shadow:0 4px 16px #e0e7ff;padding:32px;">
        <form action="{{ route('reviews.store') }}" method="POST">
            @csrf
            <div style="margin-bottom:18px;">
                <label for="name" style="font-weight:600;">Nama:</label>
                <input type="text" name="name" id="name" required style="width:100%;padding:8px;border-radius:6px;border:1px solid #e5e7eb;">
            </div>
            <div style="margin-bottom:18px;">
                <label for="rating" style="font-weight:600;">Rating:</label>
                <select name="rating" id="rating" required style="width:100%;padding:8px;border-radius:6px;border:1px solid #e5e7eb;">
                    <option value="">Pilih rating</option>
                    @for($i=1;$i<=5;$i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>
            <div style="margin-bottom:18px;">
                <label for="comment" style="font-weight:600;">Komentar:</label>
                <textarea name="comment" id="comment" rows="3" style="width:100%;padding:8px;border-radius:6px;border:1px solid #e5e7eb;"></textarea>
            </div>
            <input type="hidden" name="music_id" value="{{ $music->id }}">
            <button type="submit" style="background:#6366f1;color:#fff;padding:10px 28px;border-radius:8px;font-weight:600;border:none;">Kirim Review</button>
        </form>
    </div>
</x-app-layout> 