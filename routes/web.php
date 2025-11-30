<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Beranda; // Pastikan menggunakan namespace Livewire yang benar (App\Livewire atau App\livewire tergantung versi/konfigurasi Anda)
use App\Livewire\User;
use App\Livewire\Produk;
use App\Livewire\Transaksi;
use App\Livewire\Laporan;

// 1. Ubah route '/' agar melakukan redirect ke named route 'login'
// Route 'login' sudah otomatis dibuat oleh Auth::routes();
Route::get('/', function () {
    return redirect()->route('login');
});

// 2. Auth::routes() mendefinisikan route untuk login, register, dll.
Auth::routes();

// 3. Semua route Livewire Anda akan diakses setelah login, jadi tetap di-protect dengan middleware 'auth'.
// Catatan: Jika Anda menggunakan Laravel 10+, disarankan menggunakan huruf kapital 'Livewire' untuk namespace.
Route::middleware(['auth'])->group(function () {
    Route::get('/home', Beranda::class)->name('home');
    Route::get('/user', User::class)->name('user');
    Route::get('/produk', Produk::class)->name('produk');
    Route::get('/transaksi', Transaksi::class)->name('transaksi');
    Route::get('/laporan', Laporan::class)->name('laporan');
    Route::get('/cetak', [App\Http\Controllers\HomeController::class, 'cetak']);
});

