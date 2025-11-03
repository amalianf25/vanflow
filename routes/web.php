<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardStaffController;

Route::get('/staff/dashboard', [DashboardStaffController::class, 'index'])
     ->name('staff.dashboard');

Route::get('/', function () {
    return view(view: 'landingPage');
});

Route::get('/admin/kelolaPengguna', [AdminController::class, 'index'])->name('admin.kelolaPengguna');


Route::get('/staff/dashboard', [DashboardStaffController::class, 'index'])
     ->name('staff.dashboard');
