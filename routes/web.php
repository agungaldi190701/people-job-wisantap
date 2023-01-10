<?php

use App\Http\Controllers\destinasiController;
use App\Http\Controllers\detailTransaksiController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\ratingController;
use App\Http\Controllers\userController;
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

Route::get('/tentang', function () {
    return view('content.tentang');
});

Route::get('/destinasi', function () {
    return view('content.destinasi');
});

Route::get('/register', function () {
    return view('content.register');
});


Route::get('/', [destinasiController::class, 'home']);

Route::get('/destinasi', [destinasiController::class, 'index']);
Route::get('/detail/{id}', [destinasiController::class, 'show']);
Route::post('/upload', [destinasiController::class, 'store']);
Route::delete('/hapus/{id}', [destinasiController::class, 'destroy']);
Route::get('/edit/{id}', [destinasiController::class, 'edit']);
Route::post('destinasi/update/{id}', [destinasiController::class, 'update']);


// Login
Route::get('/login', [loginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/masuk', [loginController::class, 'authenticate'])->middleware('guest');
Route::post('/logout', [loginController::class, 'logout'])->middleware('auth');


// Registrasi
Route::get('/register', [userController::class, 'register'])->middleware('guest');
Route::post('/daftar', [userController::class, 'store'])->middleware('guest');

// rating
Route::get('/rating/{id}', [ratingController::class, 'rating']);
Route::post('/upload-rating', [ratingController::class, 'storeRating']);


// pembelian Tiket
Route::get('pembelian-tiket/{id}', [detailTransaksiController::class, 'index']);
Route::post('pembelianTiket', [detailTransaksiController::class, 'store']);
Route::get('tiketKu', [detailTransaksiController::class, 'tiketKu']);
Route::post('updateStatus/{id}', [detailTransaksiController::class, 'updateStatus']);

// semua TIket
Route::get('semuaTiket', [detailTransaksiController::class, 'semuaTiket']);
Route::post('accStatus/{id}', [detailTransaksiController::class, 'accStatus']);