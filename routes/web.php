<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\ReviewController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

// Dashboard setelah login (user biasa)
Route::get('/dashboard', function () {
    $musics = \App\Models\Music::all();
    return view('dashboard', compact('musics'));
})->middleware(['auth'])->name('dashboard');

// ======================
// ROUTE UNTUK USER BIASA
// ======================
Route::middleware(['auth'])->group(function () {
    // Profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/password', [PasswordController::class, 'update'])->name('password.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Melihat daftar musik dan detail
    Route::get('/music', [MusicController::class, 'index'])->name('music.index');
    Route::get('/music/{music}', [MusicController::class, 'show'])->name('music.show');

    // Memberi review
    Route::get('/reviews/create/{music}', function($musicId) {
        $music = \App\Models\Music::findOrFail($musicId);
        return view('reviews.create', compact('music'));
    })->middleware(['auth'])->name('reviews.create');
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
});

// ======================
// ROUTE KHUSUS ADMIN
// ======================
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard admin
    Route::get('/dashboard', function () {
        $musics = \App\Models\Music::all();
        $reviews = \App\Models\Review::with('music')->get();
        return view('admin.dashboard', compact('musics', 'reviews'));
    })->name('dashboard');

    // CRUD Musik oleh Admin
    Route::get('/music', [MusicController::class, 'adminIndex'])->name('music.index');
    Route::get('/music/create', [MusicController::class, 'create'])->name('music.create');
    Route::post('/music', [MusicController::class, 'store'])->name('music.store');
    Route::get('/music/{music}/edit', [MusicController::class, 'edit'])->name('music.edit');
    Route::put('/music/{music}', [MusicController::class, 'update'])->name('music.update');
    Route::delete('/music/{music}', [MusicController::class, 'destroy'])->name('music.destroy');

    // Route hapus review (admin)
    Route::delete('/reviews/{review}', [\App\Http\Controllers\ReviewController::class, 'destroy'])->name('reviews.destroy');
});

require __DIR__ . '/auth.php';
