<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Music;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    // Simpan review baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'music_id' => 'required|exists:music,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        Review::create([
            'name' => $request->name,
            'music_id' => $request->music_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect()->route('dashboard')->with('success', 'Review berhasil ditambahkan!');
    }

    // Update review (opsional, hanya pemilik)
    public function update(Request $request, $id)
    {
        $review = Review::findOrFail($id);
        if ($review->user_id !== Auth::id()) {
            abort(403);
        }
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);
        $review->update([
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);
        return back()->with('success', 'Review berhasil diupdate!');
    }

    // Hapus review (opsional, hanya pemilik)
    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        // Jika admin, boleh hapus review apapun
        if (Auth::user() && Auth::user()->role === 'admin') {
            $review->delete();
            return redirect()->route('admin.dashboard')->with('success', 'Review berhasil dihapus!');
        }
        // Jika user biasa, hanya boleh hapus review milik sendiri
        if ($review->user_id !== Auth::id()) {
            abort(403);
        }
        $review->delete();
        return back()->with('success', 'Review berhasil dihapus!');
    }
}
