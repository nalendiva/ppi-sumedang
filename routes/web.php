<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AdminController;
 

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', fn() => view('pages.home'))->name('home');
Route::get('/anggota', fn() => view('pages.anggota'))->name('anggota');

// --- Tambahkan route berikut ---

Route::get('/berita', fn() => view('pages.berita.index'))->name('berita.index');
Route::get('/berita/{slug}', fn($slug) => view('pages.berita.show', compact('slug')))->name('berita.show');
Route::get('/profil', fn() => view('pages.profil'))->name('profil');
Route::get('/dokumentasi', fn() => view('pages.dokumentasi'))->name('dokumentasi');
Route::get('/mitra', fn() => view('pages.mitra'))->name('mitra');

// --- Auth ---
Route::get('/login', fn() => view('pages.auth.login'))->name('login');
Route::get('/register', fn() => view('pages.auth.register'))->name('register');
Route::get('/forgot-password', fn() => view('pages.auth.forgot-password'))->name('password.request');
Route::post('/login', fn() => back())->name('login.post');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/test', function () {
    return 'OK';
});

Route::prefix('anggota')->group(function () {
    Route::get('/',          [AnggotaController::class, 'index']);   // GET /api/anggota
    Route::get('/search',    [AnggotaController::class, 'search']);  // GET /api/anggota/search
    Route::post('/store',    [AnggotaController::class, 'store'])->middleware(['auth:api', 'role:superadmin,admin']);
    Route::get('/indexAdmin', [AnggotaController::class, 'IndexAdmin'])->middleware(['auth:api', 'role:superadmin,admin']);
    Route::delete('/{id}',   [AnggotaController::class, 'destroy'])->middleware(['auth:api', 'role:superadmin,admin']);
    Route::put('/update/{id}', [AnggotaController::class, 'update'])->middleware(['auth:api', 'role:superadmin,admin']);
});

Route::prefix('admin')->group(function () {
    Route::get('/',          [AdminController::class, 'index'])->middleware(['auth:api', 'role:superadmin']);
    Route::post('/store',    [AdminController::class, 'store'])->middleware(['auth:api', 'role:superadmin']);
    Route::delete('/{id}', [AdminController::class, 'destroy'])->middleware(['auth:api', 'role:superadmin']);
});