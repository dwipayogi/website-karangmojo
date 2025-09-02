<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UsahaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\viewBeritaController;
use Illuminate\Support\Facades\Route;


Route::get('/daftar', [RegisterController::class, 'index'])->name('daftar');
Route::post('/daftar', [RegisterController::class, 'register'])->name('daftar.submit');


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'checkRole:Superadmin,Admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::get('/kelolaBerita', [BeritaController::class, 'index'])->name('kelolaBerita');
    Route::delete('/kelolaBerita/{id}', [BeritaController::class, 'destroy'])->name('hapusBerita');

    Route::get('/kelolaGaleri', [GaleriController::class, 'index'])->name('kelolaGaleri');
    Route::post('/kelolaGaleri', [GaleriController::class, 'store'])->name('tambahGaleri');
    Route::put('/kelolaGaleri/{id}', [GaleriController::class, 'update'])->name('updateGaleri');
    Route::delete('/kelolaGaleri/{id}', [GaleriController::class, 'destroy'])->name('hapusGaleri');

    Route::get('/kelolaUsaha', [UsahaController::class, 'index'])->name('kelolaUsaha');
    Route::post('/kelolaUsaha', [UsahaController::class, 'store'])->name('tambahUsaha');
    Route::get('/kelolaUsaha/{id}', [UsahaController::class, 'show'])->name('lihatUsaha');
    Route::put('/kelolaUsaha/{id}', [UsahaController::class, 'update'])->name('updateUsaha');
    Route::delete('/kelolaUsaha/{id}', [UsahaController::class, 'destroy'])->name('hapusUsaha');
});

Route::middleware(['auth', 'checkRole:Superadmin'])->group(function () {
    Route::get('/kelolaAkun', [UserController::class, 'index'])->name('kelolaAkun');
    Route::patch('/kelolaAkun/{id}', [UserController::class, 'update'])->name('updateAkun');
    Route::delete('/kelolaAkun/{id}', [UserController::class, 'destroy'])->name('hapusAkun');

});


Route::get('/berita', [viewBeritaController::class, 'index']);
Route::get('/berita/{id}', [viewBeritaController::class, 'detail'])->name('berita.detail');
Route::get('/', [Controller::class, 'index'])->name('landing_page');
