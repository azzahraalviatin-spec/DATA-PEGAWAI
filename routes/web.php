<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\JabatanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// AUTH (login, register)
Auth::routes();

// 👉 kalau buka / langsung ke LOGIN
Route::get('/', function () {
    return redirect('/login');
});

// 👉 dashboard hanya boleh kalau sudah login
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

// 👉 menu pegawai & jabatan (wajib login)
Route::resource('pegawai', PegawaiController::class)->middleware('auth');
Route::resource('jabatan', JabatanController::class)->middleware('auth');

// 👉 logout (POST)
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');
