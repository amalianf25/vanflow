<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardStaffController;
use App\Http\Controllers\DataPembelianController;
use App\Http\Controllers\LaporanController;


Route::get('/', function () {
    return view(view: 'landingPage');
});

Route::get('/admin/kelolaPengguna', [AdminController::class, 'index'])->name('admin.kelolaPengguna');

Route::get('/staff/dashboard', [DashboardStaffController::class, 'index'])->name('staff.dashboard');
Route::get('/staff/data-pembelian', [DataPembelianController::class, 'index'])->name('staff.dataPembelian');

Route::get('/staff/laporanbulanan', [LaporanController::class, 'index'])->name('staff.laporanbulanan');
