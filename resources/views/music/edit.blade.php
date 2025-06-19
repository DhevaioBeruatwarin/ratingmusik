--- resources/views/music/edit.blade.php ---
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Musik</h1>
    <form action="{{ route('admin.music.update', $music->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" name="title" class="form-control" value="{{ $music->title }}" required>
        </div>
        <div class="mb-3">
            <label for="artist" class="form-label">Artis</label>
            <input type="text" name="artist" class="form-control" value="{{ $music->artist }}" required>
        </div>
        <div class="mb-3">
            <label for="genre" class="form-label">Genre</label>
            <input type="text" name="genre" class="form-control" value="{{ $music->genre }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
