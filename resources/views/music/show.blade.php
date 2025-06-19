@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Musik</h1>
    <p><strong>Judul:</strong> {{ $music->title }}</p>
    <p><strong>Artis:</strong> {{ $music->artist }}</p>
    <p><strong>Genre:</strong> {{ $music->genre }}</p>
    @if(Auth::user() && Auth::user()->role === 'admin')
        <a href="{{ route('admin.music.index') }}" class="btn btn-secondary">Kembali</a>
    @else
        <a href="{{ route('music.index') }}" class="btn btn-secondary">Kembali</a>
    @endif
    <hr style="margin:32px 0;">
    <h2>Reviews</h2>
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
        <p>Belum ada review.</p>
    @endif

    @auth
    <div style="margin-top:32px;">
        <h3>Beri Review</h3>
        <form action="{{ route('reviews.store') }}" method="POST">
            @csrf
            <label>Rating:</label>
            <select name="rating" required>
                <option value="">Pilih rating</option>
                @for($i=1;$i<=5;$i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
            <br>
            <label>Komentar:</label><br>
            <textarea name="comment" rows="3" style="width:100%;max-width:400px;"></textarea>
            <input type="hidden" name="music_id" value="{{ $music->id }}">
            <br>
            <button type="submit" style="margin-top:8px;background:#6366f1;color:#fff;padding:6px 18px;border-radius:6px;border:none;">Kirim</button>
        </form>
    </div>
    @endauth
</div>
@endsection