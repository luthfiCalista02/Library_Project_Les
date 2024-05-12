<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\PinjamBukuController;
use App\Models\Buku;
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

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'registered']);
Route::post('/ceklogin', [AuthController::class, 'ceklogin']);

Route::middleware('auth')->group(function(){
    //isi route khusus user login

    //route buku
Route::get('/buku', [BukuController::class, 'index']);
Route::post('/buku', [BukuController::class, 'buku']);
Route::get('/lihatbuku', [BukuController::class, 'indexx']);
Route::get('/buku/edit/{id}', [BukuController::class, 'edit']);
Route::post('/ubahbuku/{id}', [BukuController::class, 'ubah']);
Route::get('/hapusbuku/{id}', [BukuController::class, 'hapus']);

    //route kategori
Route::get('/kategori', [KategoriController::class, 'index']);
Route::post('/kategori', [KategoriController::class, 'kategori']);
Route::get('/lihatkategori', [KategoriController::class, 'indexx']);
Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit']);
Route::post('/ubahkategori/{id}', [KategoriController::class, 'ubah']);
Route::get('/hapuskategori/{id}', [KategoriController::class, 'hapus']);

    //route penerbit
Route::get('/penerbit', [PenerbitController::class, 'index']);
Route::post('/penerbit', [PenerbitController::class, 'penerbit']);
Route::get('/lihatpenerbit', [PenerbitController::class, 'indexx']);
Route::get('/penerbit/edit/{id}', [PenerbitController::class, 'edit']);
Route::post('/ubahpenerbit/{id}', [PenerbitController::class, 'ubah']);
Route::get('/hapuspenerbit/{id}', [PenerbitController::class, 'hapus']);

    //pinjam buku
Route::get('/pinjambuku', [PinjamBukuController::class, 'index']);

    //tambah pinjaman
Route::get('/tambahpeminjaman', [PinjamBukuController::class, 'tambahpeminjaman']);

    //route logout
Route::get('/logout', [AuthController::class, 'logout']);

Route::post('/simpantransaksi', [PinjamBukuController::class, 'simpantransaksi']);

});
