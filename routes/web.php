<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PinjamController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

// Rute login dan logout
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login.perpus');
Route::post('/login-perpus', [LoginController::class, 'login']);
Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('login.perpus');
})->name('logout');

// Rute dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

// Rute profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rute anggota
Route::middleware('auth')->prefix('anggota')->group(function () {
    Route::get('/', [AnggotaController::class, 'index'])->name('anggotas.index');
    Route::get('/create', [AnggotaController::class, 'create'])->name('anggotas.create');
    Route::post('/create', [AnggotaController::class, 'store'])->name('anggotas.store');
    Route::get('/edit/{id}', [AnggotaController::class, 'edit'])->name('anggotas.edit');
    Route::put('/edit/{id}', [AnggotaController::class, 'update'])->name('anggotas.update');
    Route::delete('/{id}', [AnggotaController::class, 'destroy'])->name('anggotas.destroy');
});

// Rute buku
Route::middleware('auth')->prefix('buku')->group(function () {
    Route::get('/', [BukuController::class, 'index'])->name('bukus.index');
    Route::get('/create', [BukuController::class, 'create'])->name('bukus.create');
    Route::post('/create', [BukuController::class, 'store'])->name('bukus.store');
    Route::get('/edit/{buku}', [BukuController::class, 'edit'])->name('bukus.edit');
    Route::put('/edit/{buku}', [BukuController::class, 'update'])->name('bukus.update');
    Route::delete('/{buku}', [BukuController::class, 'destroy'])->name('bukus.destroy');
});

// Rute transaksi
Route::middleware('auth')->prefix('transaksi')->group(function () {
    Route::get('/', [TransaksiController::class, 'index'])->name('transaksis.index');
    Route::get('/create', [TransaksiController::class, 'create'])->name('transaksis.create');
    Route::post('/create', [TransaksiController::class, 'store'])->name('transaksis.store');
    Route::get('/edit/{transaksi}', [TransaksiController::class, 'edit'])->name('transaksis.edit');
    Route::put('/edit/{transaksi}', [TransaksiController::class, 'update'])->name('transaksis.update');
    Route::delete('/{transaksi}', [TransaksiController::class, 'destroy'])->name('transaksis.destroy');
});

// Rute peminjaman
Route::middleware('auth')->post('/pinjam/store', [PinjamController::class, 'store'])->name('pinjam.store');
Route::middleware('auth')->get('/peminjaman', [TransaksiController::class, 'index'])->name('peminjaman.index');

// Rute laporan
Route::middleware('auth')->prefix('laporan')->group(function () {
    Route::get('/laporan/anggota/pdf', [LaporanController::class, 'cetakAnggota'])->name('laporan.anggota.pdf');
    Route::get('/laporan/buku/pdf', [LaporanController::class, 'cetakBuku'])->name('laporan.buku.pdf');
});

require __DIR__ . '/auth.php';
