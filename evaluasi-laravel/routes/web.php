<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/pelatihan', [HomeController::class, 'daftarPelatihan'])->name('pelatihan.index');
Route::post('/cek-nip', [HomeController::class, 'cekNip'])->name('cek-nip');

use App\Http\Controllers\EvaluasiPenyelenggaraanController;
 
Route::get('/evaluasi-penyelenggaraan', [EvaluasiPenyelenggaraanController::class, 'create'])
    ->name('evaluasi-penyelenggaraan.create');
 
Route::post('/evaluasi-penyelenggaraan', [EvaluasiPenyelenggaraanController::class, 'store'])
    ->name('evaluasi-penyelenggaraan.store');
 
Route::get('/evaluasi-penyelenggaraan/success', [EvaluasiPenyelenggaraanController::class, 'success'])
    ->name('evaluasi-penyelenggaraan.success');

use App\Http\Controllers\EvaluasiTpController;
 
Route::get('/evaluasi-tp', [EvaluasiTpController::class, 'create'])
    ->name('evaluasi-tp.create');
 
Route::post('/evaluasi-tp', [EvaluasiTpController::class, 'store'])
    ->name('evaluasi-tp.store');
 
Route::get('/evaluasi-tp/success', [EvaluasiTpController::class, 'success'])
    ->name('evaluasi-tp.success');
