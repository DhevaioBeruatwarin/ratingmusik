--- resources/views/music/create.blade.php ---
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Musik</h1>
    <form action="{{ route('music.store') }}" method="POST">
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
@endsection
