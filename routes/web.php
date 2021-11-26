<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CalonController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PemilihanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [LoginController::class, 'login_form'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/login', [LoginController::class, 'login_form'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::middleware(['auth', 'ceklevel:admin'])->group(function () {
    Route::post('/export_user', [UserController::class, 'export_user'])->name('export_user');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/chart', [DashboardController::class, 'chart'])->name('chart');
    Route::resource('calon', CalonController::class);
    Route::resource('user', UserController::class)->except(['destroy']);
    Route::delete('user_hapus', [UserController::class, 'destroy'])->name('hapus_user');
    Route::delete('pemilihan_hapus', [PemilihanController::class, 'destroy'])->name('hapus_pilihan');
    Route::resource('pemilihan', PemilihanController::class)->except(['destroy']);
});
Route::middleware(['auth', 'ceklevel:admin,biasa'])->group(function () {
    Route::get('/home', [DashboardController::class, 'home'])->name('home');
    Route::get('/pemilihan_calon', [DashboardController::class, 'create'])->name('pemilihan_calon');
    Route::post('/pemilihan', [DashboardController::class, 'store'])->name('pilih_calon');
});

// Auth::routes();
