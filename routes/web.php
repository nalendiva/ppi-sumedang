<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BeritaController;


Route::get('/', function () {
    return view('welcome');
});

Route::post('/login', [AuthController::class, 'login']);
Route::get('/test', function () {
    return 'OK';
});

Route::prefix('anggota')->group(function () {
    Route::get('/',          [AnggotaController::class, 'index']);   // GET /api/anggota
    Route::get('/search',    [AnggotaController::class, 'search']);  // GET /api/anggota/search
    Route::post('/store',    [AnggotaController::class, 'store'])->middleware(['auth:api', 'role:superadmin,admin']);
    Route::get('/indexAdmin',[AnggotaController::class, 'IndexAdmin'])->middleware(['auth:api', 'role:superadmin,admin']);
    Route::delete('/{id}',   [AnggotaController::class, 'destroy'])->middleware(['auth:api', 'role:superadmin,admin']);
    Route::put('/update/{id}',[AnggotaController::class, 'update'])->middleware(['auth:api', 'role:superadmin,admin']);
});

Route::prefix('admin')->group(function(){
    Route::get('/',          [AdminController::class, 'index'])->middleware(['auth:api', 'role:superadmin']);
    Route::post('/store',    [AdminController::class, 'store'])->middleware(['auth:api', 'role:superadmin']);
    Route::delete('/{id}', [AdminController::class, 'destroy'])->middleware(['auth:api', 'role:superadmin']);
});

