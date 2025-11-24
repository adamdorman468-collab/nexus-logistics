<?php

use App\Http\Controllers\TrackingController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan; // Tambahan untuk migrasi

// Halaman Depan (Bebas akses)
Route::get('/', [TrackingController::class, 'index'])->name('home');

// Halaman Hasil & Proses Lacak (Dibatasi 10x per menit via middleware 'throttle')
Route::get('/track', [TrackingController::class, 'track'])
    ->middleware('throttle:10,1') 
    ->name('track');

// --- ROUTE KHUSUS MIGRASI (HANYA SEMENTARA) ---
Route::get('/setup-database', function () {
    try {
        // 1. Jalankan Migrasi (Force karena production)
        Artisan::call('migrate', ["--force" => true]);
        $output = Artisan::output();
        
        // 2. Clear Cache (Opsional, biar fresh)
        Artisan::call('optimize:clear');
        $output .= "\n" . Artisan::output();

        return "<pre>BERHASIL! Database sudah dibuat.\n\nLog:\n$output</pre>";
    } catch (\Exception $e) {
        return "<pre>GAGAL:\n" . $e->getMessage() . "</pre>";
    }
});