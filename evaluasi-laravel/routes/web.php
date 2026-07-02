<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\EvaluasiPenyelenggaraanController;
use App\Http\Controllers\EvaluasiTpController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// ==========================
// PUBLIK
// ==========================
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/pelatihan', [HomeController::class, 'daftarPelatihan'])->name('pelatihan.index');
Route::post('/cek-nip', [HomeController::class, 'cekNip'])->name('cek-nip');

// Evaluasi Tenaga Pengajar
Route::get('/evaluasi-tp', [EvaluasiTpController::class, 'create'])->name('evaluasi-tp.create');
Route::post('/evaluasi-tp', [EvaluasiTpController::class, 'store'])->name('evaluasi-tp.store');
Route::get('/evaluasi-tp/success', [EvaluasiTpController::class, 'success'])->name('evaluasi-tp.success');


// Evaluasi Penyelenggaraan
Route::get('/evaluasi-penyelenggaraan', [EvaluasiPenyelenggaraanController::class, 'create'])
    ->name('evaluasi-penyelenggaraan.create');
Route::post('/evaluasi-penyelenggaraan', [EvaluasiPenyelenggaraanController::class, 'store'])
    ->name('evaluasi-penyelenggaraan.store');
Route::get('/evaluasi-penyelenggaraan/success', [EvaluasiPenyelenggaraanController::class, 'success'])
    ->name('evaluasi-penyelenggaraan.success');

// ==========================
// ADMIN
// ==========================
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminController::class, 'loginForm'])->name('login');
    Route::post('/login', [AdminController::class, 'login'])->name('login.post');
    Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::get('/tabel-klasikal', [AdminController::class, 'tabelKlasikal'])->name('tabel.klasikal');
    Route::get('/tabel-elearning', [AdminController::class, 'tabelElearning'])->name('tabel.elearning');
});
Route::get('/evaluasi-penyelenggaraan', [EvaluasiPenyelenggaraanController::class, 'create'])->name('evaluasi-penyelenggaraan.create');
Route::post('/evaluasi-penyelenggaraan', [EvaluasiPenyelenggaraanController::class, 'store'])->name('evaluasi-penyelenggaraan.store');
Route::get('/evaluasi-penyelenggaraan/success', [EvaluasiPenyelenggaraanController::class, 'success'])->name('evaluasi-penyelenggaraan.success');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/cek-nip', [HomeController::class, 'cekNip'])->name('cek-nip');

// Rute Evaluasi Tenaga Pengajar
Route::post('/evaluasi-tp/set-session', [EvaluasiTpController::class, 'setSession'])->name('evaluasi-tp.set-session');
Route::get('/evaluasi-tp', [EvaluasiTpController::class, 'create'])->name('evaluasi-tp.create');
Route::post('/evaluasi-tp/get-widyaiswara', [EvaluasiTpController::class, 'getWidyaiswara'])->name('evaluasi-tp.get-widyaiswara');
Route::post('/evaluasi-tp/store', [EvaluasiTpController::class, 'store'])->name('evaluasi-tp.store');
Route::get('/evaluasi-tp/success', [EvaluasiTpController::class, 'success'])->name('evaluasi-tp.success');

// Rute Evaluasi Penyelenggaraan
Route::post('/evaluasi-penyelenggaraan/set-session', [EvaluasiPenyelenggaraanController::class, 'setSession'])->name('evaluasi-penyelenggaraan.set-session');
Route::get('/evaluasi-penyelenggaraan', [EvaluasiPenyelenggaraanController::class, 'create'])->name('evaluasi-penyelenggaraan.create');
Route::post('/evaluasi-penyelenggaraan', [EvaluasiPenyelenggaraanController::class, 'store'])->name('evaluasi-penyelenggaraan.store');
Route::get('/evaluasi-penyelenggaraan/success', [EvaluasiPenyelenggaraanController::class, 'success'])->name('evaluasi-penyelenggaraan.success');
