<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    // users
    Route::resource('user', UsersController::class);
    //Dashboard
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
    //Logout
    Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');
});

//Auth
Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('authentication', [AuthController::class, 'authentication'])->name('auth.authentication');
