<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AdminController;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/admin/anggota', function () {
    return view('pages.admin.anggota');
})->name('admin.anggota.index');

Route::get('/admin', function () {
    return 'Dashboard sementara';
})->name('admin.dashboard');

Route::prefix('page')->group(function () {
    Route::get('/home', fn() => view('pages.home'))->name('home');
    Route::get('/anggota', fn() => view('pages.anggota'))->name('anggota');
    Route::get('/berita', fn() => view('pages.berita.index'))->name('berita.index');
    Route::get('/berita/{slug}', fn($slug) => view('pages.berita.show', compact('slug')))->name('berita.show');
    Route::get('/profil', fn() => view('pages.profil'))->name('profil');
    Route::get('/dokumentasi', fn() => view('pages.dokumentasi'))->name('dokumentasi');
    Route::get('/mitra', fn() => view('pages.mitra'))->name('mitra');
    Route::get('/login', fn() => view('pages.auth.login'))->name('login');
});



// Helmi
Route::post('/login', [AuthController::class, 'login']);

Route::prefix('anggota')->group(function () {
    Route::get('/',          [AnggotaController::class, 'index']);   // GET /api/anggota
    Route::get('/search',    [AnggotaController::class, 'search']);  // GET /api/anggota/search
    Route::post('/store',    [AnggotaController::class, 'store']); //->middleware(['auth:api', 'role:superadmin,admin']);
    Route::get('/indexAdmin', [AnggotaController::class, 'IndexAdmin']); //->middleware(['auth:api', 'role:superadmin,admin']);
    Route::delete('/{id}',   [AnggotaController::class, 'destroy']); //->middleware(['auth:api', 'role:superadmin,admin']);
    Route::put('/update/{id}', [AnggotaController::class, 'update']); //->middleware(['auth:api', 'role:superadmin,admin']);
});

Route::prefix('admin')->group(function () {
    Route::get('/',          [AdminController::class, 'index'])->middleware(['auth:api', 'role:superadmin']);
    Route::post('/store',    [AdminController::class, 'store'])->middleware(['auth:api', 'role:superadmin']);
    Route::delete('/{id}', [AdminController::class, 'destroy'])->middleware(['auth:api', 'role:superadmin']);
});
