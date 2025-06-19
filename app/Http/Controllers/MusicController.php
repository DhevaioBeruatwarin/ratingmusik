<?php

namespace App\Http\Controllers;

use App\Models\Music;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    // Tampilkan semua musik untuk user biasa
    public function index()
    {
        $musics = Music::all();
        return view('music.index', compact('musics'));
    }

    // ✅ Tampilkan semua musik untuk admin (dengan route khusus)
    public function adminIndex()
    {
        $musics = Music::all();
        return view('music.index', compact('musics'));
    }

    // Tampilkan form tambah musik
    public function create()
    {
        return view('music.create');
    }

    // Simpan musik baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'artist' => 'required|string|max:255',
            'genre' => 'required|string|max:100',
        ]);

        Music::create($request->only('title', 'artist', 'genre'));

        return redirect()->route('admin.music.index')->with('success', 'Musik berhasil ditambahkan!');
    }

    // Tampilkan detail musik (opsional)
    public function show($id)
    {
        $music = Music::findOrFail($id);
        return view('music.show', compact('music'));
    }

    // Tampilkan form edit musik
    public function edit($id)
    {
        $music = Music::findOrFail($id);
        return view('music.edit', compact('music'));
    }

    // Simpan perubahan musik
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'artist' => 'required|string|max:255',
            'genre' => 'required|string|max:100',
        ]);

        $music = Music::findOrFail($id);
        $music->update($request->only('title', 'artist', 'genre'));

        return redirect()->route('admin.dashboard')->with('success', 'Musik berhasil diperbarui!');
    }

    // Hapus musik
    public function destroy($id)
    {
        $music = Music::findOrFail($id);
        // Hapus semua review terkait
        $music->reviews()->delete();
        $music->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Musik dan semua review terkait berhasil dihapus!');
    }
}
