<?php

use Illuminate\Support\Facades\Route;

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
