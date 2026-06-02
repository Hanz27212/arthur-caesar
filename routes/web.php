<?php

// use App\Http\Controllers\ConverterController;
// use App\Http\Controllers\AuthController;
// use App\Http\Controllers\PenggunaController;
// use App\Http\Controllers\DashboardController;
// use App\Http\Controllers\BukuController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// //ROUTE UNTUK CONVERTER
// Route::match(['get', 'post'], '/converter', [ConverterController::class, 'index'])->name('converter');

// // #### ROUTE UNTUK AUTH ####

// // Route Login
// Route::get('/login', [AuthController::class, 'login']);
// Route::post('/login', [AuthController::class, 'prosesLogin']);

// //Route untuk dashboard
// Route::middleware(['AuthMiddleware'])->group(function () {
//     Route::get('/dashboard', [DashboardController::class, 'dashboard']);
// });

// //Buku
// Route::get('/buku', [BukuController::class, 'index'])->name('user.daftar-buku');

// //Route untuk daftar Pengguna
// // daftar pengguna
// Route::get('/daftar_pengguna', [PenggunaController::class, 'index']);

// // tambah
// Route::get('/tambah_pengguna', [PenggunaController::class, 'create']);
// Route::post('/tambah_pengguna', [PenggunaController::class, 'store']);

// // edit
// Route::get('/edit/{id}', [PenggunaController::class, 'edit']);
// Route::post('/update/{id}', [PenggunaController::class, 'update']);

// // hapus
// Route::get('/delete/{id}', [PenggunaController::class, 'destroy']);

// // Route untuk logout
// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



// use App\Http\Controllers\MahasiswaController;

// Route::resource('mahasiswa', MahasiswaController::class);




// Materi tgl 12,19 mei 2026 (Blade templating Engine Laravel)

//1. csrf  token yang digunakan untuk agar data yang dikirimkan aman dan tidak bisa diakses oleh pihak lain.
//2.

Route::get('/home', function () {
    return view('home');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/form', function () {
    return view('form');
});
Route::post('/form', function () {
    return "Data Berhasil Dikirim";
});
Route::get('/dashboard', function () {
    return "Dashboard";
})->name('dashboard');


//Tugas Praktikum

Route::get('/', function () {
    return view('rumah');
});

Route::get('/tentang', function () {
    return view('tentang');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/biodata', function () {
    return view('biodata');
});

Route::get('/matakuliah', function () {

    $matakuliah = [
        'Pemrograman Web',
        'Basis Data',
        'Struktur Data',
        'Jaringan Komputer',
        'Sistem Operasi'
    ];

    return view('matakuliah', compact('matakuliah'));
});
