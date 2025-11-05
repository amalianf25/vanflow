<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardStaffController;
use App\Http\Controllers\DataPembelianController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\RekapMingguanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\ProfilPekerjaController;


Route::get('/', function () {
    return view(view: 'landingPage');
});

Route::get('/admin/kelolaPengguna', [AdminController::class, 'index'])->name('admin.kelolaPengguna');

Route::get('/staff/dashboard', [DashboardStaffController::class, 'index'])->name('staff.dashboard');
Route::get('/staff/data-pembelian', [DataPembelianController::class, 'index'])->name('staff.dataPembelian');

Route::get('/staff/laporanbulanan', [LaporanController::class, 'index'])->name('staff.laporanbulanan');
Route::get('/staff/rekapmingguan', [RekapMingguanController::class, 'rekapMingguan'])->name('staff.rekapmingguan');
Route::get('/staff/profil', [ProfileController::class, 'show'])->name('staff.profil');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

Route::get('/pekerja/rekap-mingguan', [RekapController::class, 'index'])->name('pekerja.rekap.mingguan');
Route::get('/pekerja/profil', [ProfilPekerjaController::class, 'show'])->name('pekerja.profil');
Route::post('/pekerja/profil/update', [ProfilPekerjaController::class, 'update'])->name('profil.update');