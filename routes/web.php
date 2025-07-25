<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\Guru\DashboardController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\Siswa\DashboardController as SiswaDashboardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {

    Route::middleware('admin')->group(function () {
        Route::resource('user', UsersController::class);
        //Dashboard
        // Route::get('dashboard', AdminDashboardController::class, 'index')->name('admin.dashboard');

        Route::get('/dashboardadmin', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/dashboard', function () {
            return view('templates.main');
        })->name('dashboard');
        //Data
        Route::resource('item', ItemController::class);
        Route::resource('student', StudentController::class);
        Route::resource('classroom', ClassroomController::class);
        Route::resource('borrow', BorrowController::class);
        //Status
        Route::post('status/{id}', [BorrowController::class, 'borrowStatus'])->name('borrow.status');
    });
    Route::middleware('guru')->prefix('guru')->group(function () {
        Route::get('/dashboardguru', [DashboardController::class, 'index'])->name('guru.dashboard');
    });
    Route::middleware('siswa')->prefix('siswa')->group(function () {
        Route::get('/dashboardsiswa', [SiswaDashboardController::class, 'index'])->name('siswa.dashboard');
    });

    //Logout
    Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');
});

//Auth
Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('authentication', [AuthController::class, 'authentication'])->name('auth.authentication');
