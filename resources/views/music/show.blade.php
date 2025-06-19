--- resources/views/music/show.blade.php ---
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Musik</h1>
    <p><strong>Judul:</strong> {{ $music->title }}</p>
    <p><strong>Artis:</strong> {{ $music->artist }}</p>
    <p><strong>Genre:</strong> {{ $music->genre }}</p>
    <a href="{{ route('music.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection