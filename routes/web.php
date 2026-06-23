<?php

use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;


// ==================== RUTE HALAMAN MADING (PUBLIK) ====================

// Halaman Utama Mading (Menampilkan semua surat & form input)
Route::get('/', [MessageController::class, 'index'])->name('mading.index');

// Aksi ketika user menekan tombol "Gantung di Mading" (Kirim Surat)
Route::post('/send-letter', [MessageController::class, 'store'])->name('mading.store');

// Endpoint AJAX khusus untuk memverifikasi PIN dan membuka teks surat yang terkunci
Route::post('/unlock-letter/{id}', [MessageController::class, 'unlockLetter'])->name('mading.unlock');


// ==================== RUTE PENGELOLAAN ADMIN (PROTESI AUTH) ====================

// Grup Rute yang hanya bisa diakses jika Admin sudah login (Menggunakan Middleware 'auth')
Route::middleware(['auth'])->group(function () {

    // Halaman Dashboard Utama Admin (Tempat memoderasi semua pesan)
    Route::get('/admin/dashboard', [MessageController::class, 'adminIndex'])->name('dashboard');

    // Aksi ketika Admin menekan tombol "Hapus Surat" di tabel kontrol
    Route::delete('/admin/dashboard/{id}', [MessageController::class, 'destroy'])->name('mading.destroy');

});

if (file_exists(__DIR__.'/auth.php')) {
    require __DIR__.'/auth.php';
}
