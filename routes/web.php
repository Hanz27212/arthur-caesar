<?php

use App\http\Controllers\ConverterController;
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

// Route::get('/', function () {
//     return view('home');
// });

// Route::get('/about', function () {
//     return view('about', ['nama' => 'Arthur Caesar']);
// });

Route::get('/', [ConverterController::class, 'index']);
Route::post('/process', [ConverterController::class, 'process'])->name('converter.process');