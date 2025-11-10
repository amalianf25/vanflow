<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardStaffController;
use App\Http\Controllers\DataPembelianController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\RekapMingguanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\ProfilPekerjaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\lupaPasswordController;
use App\Http\Controllers\ResetPasswordController;


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

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/login', function () {
    return view('auth.login'); // file di resources/views/auth/login.blade.php
})->name('login');
Route::get('/lupa-password', function () {
    return view('auth.lupa-password'); // file di resources/views/auth/lupa-password.blade.php
})->name('password.request');
Route::post('/lupa-password', function (Request $request) {
    return back()->with('status', 'Link reset telah dikirim ke email Anda.');
})->name('password.email');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'resetPassword'])->name('password.update');