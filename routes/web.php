<?php

use App\Http\Controllers\ConverterController;
use App\Http\Controllers\AuthController;
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

//Route untuk converter
Route::match(['get', 'post'], '/converter', [ConverterController::class, 'index'])->name('converter');

// Route untuk auth
Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware(['AuthMiddleware'])->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard']);
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// });

// Route::get('/login', function () {
//     return view('login', ['nama' => 'Arthur Caesar']);
// });
