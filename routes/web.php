<?php

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

route::group(['name' => 'guest'], function () {
    route::get('/login', [App\Http\Controllers\LoginController::class, 'index'])->name('login');
    route::post('/login/proses', [App\Http\Controllers\LoginController::class, 'login'])->name('login.proses');
    Route::get('/register', [App\Http\Controllers\LoginController::class, 'register'])->name('register');
    Route::post('/register/proses', [App\Http\Controllers\LoginController::class, 'registerProses'])->name('register.proses');
})->middleware('guest');

route::group(['name' => 'admin'], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    // Album
    Route::get('/album', [App\Http\Controllers\AlbumController::class, 'index'])->name('album');
    route::get('/album/{id}/show', [App\Http\Controllers\AlbumController::class, 'show'])->name('album.show');
    route::post('/album/tambah', [App\Http\Controllers\AlbumController::class, 'tambah'])->name('album.tambah');
    route::delete('/album/hapus/{id}', [App\Http\Controllers\AlbumController::class, 'hapus'])->name('album.hapus');
    // Foto
    route::get('/foto', [App\Http\Controllers\FotoController::class, 'index'])->name('foto');
    route::get('/foto/detail/{id}', [App\Http\Controllers\FotoController::class, 'detail'])->name('foto.detail');
    route::post('/foto/tambah', [App\Http\Controllers\FotoController::class, 'tambah'])->name('foto.tambah');
    route::post('/foto/hapus/album', [App\Http\Controllers\FotoController::class, 'hapusAlbum'])->name('foto.hapus-album');
    route::post('/album/tambah/album', [App\Http\Controllers\FotoController::class, 'tambahkeAlbum'])->name('foto.tambah-album');
    route::post('/foto/hapus', [App\Http\Controllers\FotoController::class, 'hapus'])->name('foto.hapus');
    
    Route::get('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');
})->middleware('auth');
