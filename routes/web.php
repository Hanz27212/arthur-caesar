<?php

use App\Http\Controllers\ConverterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//ROUTE UNTUK CONVERTER
Route::match(['get', 'post'], '/converter', [ConverterController::class, 'index'])->name('converter');

// #### ROUTE UNTUK AUTH ####

// Route Login
Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'prosesLogin']);

//Route untuk dashboard 
Route::middleware(['AuthMiddleware'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard']);
});

//Route untuk daftar Pengguna 
// daftar pengguna
Route::get('/daftar_pengguna', [PenggunaController::class, 'index']);

// tambah
Route::get('/tambah_pengguna', [PenggunaController::class, 'create']);
Route::post('/tambah_pengguna', [PenggunaController::class, 'store']);

// edit
Route::get('/edit/{id}', [PenggunaController::class, 'edit']);
Route::post('/update/{id}', [PenggunaController::class, 'update']);

// hapus
Route::get('/delete/{id}', [PenggunaController::class, 'destroy']);

// Route untuk logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
