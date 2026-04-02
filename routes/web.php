<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AdminController;
 

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
    Route::post('/store',    [AnggotaController::class, 'store']);
    Route::get('/indexAdmin',[AnggotaController::class, 'IndexAdmin']);
    Route::delete('/{id}',   [AnggotaController::class, 'destroy']);
    Route::put('/update/{id}',[AnggotaController::class, 'update']);
});

Route::prefix('admin')->group(function(){
    Route::get('/',          [AdminController::class, 'index']);
    Route::post('/store',    [AdminController::class, 'store']);
    Route::delete('/{id}', [AdminController::class, 'destroy']);
});