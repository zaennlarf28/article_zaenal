<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\FrontController;
use App\Http\Middleware\isAdmin;

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

Route::get('/', [FrontController::class, 'index']);

Auth::routes(['register' => false]);
Route::get('/search', [BeritaController::class, 'search'])->name('berita.search');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware('auth', isAdmin::class)->group(function () {
    Route::resource('berita', BeritaController::class);
    Route::resource('kategori', KategoriController::class);
});

Route::resource('jenis', JenisController::class);
Route::resource('produk', ProdukController::class);

Route::get('/konsultasi', function () {
    return view('konsultasi');
});

Route::get('/berita_sehat', function () {
    return view('berita_sehat');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/wellness', function () {
    return view('wellness');
});
Route::get('/starter_page', function () {
    return view('starter_page');
});

Route::get('/berita/detail/{id}', [BeritaController::class, 'detail'])->name('berita.detail');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function (){
    Route::get('/', function () {
        return view('admin.index'); 
    });
});