<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\SehatController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\DietController;
use App\Http\Controllers\KonsultasiController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\PertanyaanController;
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


Route::get('/berita_sehat', [FrontController::class, 'sehat']);
Route::get('/wellness', [FrontController::class, 'diet']);
Route::get('/konsultasi', [FrontController::class, 'konsultasi']);
Route::get('/', [FrontController::class, 'index'])->name('beranda');


Route::get('/kategori/{slug}', [BeritaController::class, 'kategori'])->name('kategori.show');


Auth::routes(['register' => false]);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('admin')->middleware('auth', isAdmin::class)->group(function () {
    Route::resource('berita', BeritaController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('sehat', SehatController::class);
    Route::resource('diet', DietController::class);
    Route::resource('konsultasi', KonsultasiController::class);
    Route::resource('pertanyaan', PertanyaanController::class);
});


Route::resource('jenis', JenisController::class);
Route::resource('produk', ProdukController::class);



Route::get('/contact', function () {
    return view('contact');
});

Route::get('/starter_page', function () {
    return view('starter_page');
});


Route::get('/berita/detail/{id}', [BeritaController::class, 'detail'])->name('berita.detail');
Route::get('/berita/kategori_sama/{id}', [BeritaController::class, 'kategori_sama'])->name('berita.kategori_sama');
Route::get('/sehat/detail/{id}', [SehatController::class, 'detail'])->name('sehat.detail');
Route::get('/diet/detail/{id}', [DietController::class, 'detail'])->name('diet.detail');
Route::get('/konsultasi/detail/{id}', [KonsultasiController::class, 'detail'])->name('konsultasi.detail');
Route::get('/kategori/{id}', [BeritaController::class, 'byKategori'])->name('berita.kategori');


Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function (){
    Route::get('/', function () {
        return view('admin.index'); 
    });
});

Route::get('/admin/pertanyaan', [PertanyaanController::class, 'index'])->name('pertanyaan.index');
Route::post('/pertanyaan', [PertanyaanController::class, 'store'])->name('pertanyaan.store');
Route::post('/pertanyaan/jawab/{id}', [PertanyaanController::class, 'jawab'])->name('pertanyaan.jawab');
