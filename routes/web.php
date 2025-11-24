<?php

use App\Http\Controllers\TrackingController;
use Illuminate\Support\Facades\Route;

// Halaman Depan (Bebas akses)
Route::get('/', [TrackingController::class, 'index'])->name('home');

// Halaman Hasil & Proses Lacak (Dibatasi 10x per menit via middleware 'throttle')
Route::get('/track', [TrackingController::class, 'track'])
    ->middleware('throttle:10,1') 
    ->name('track');