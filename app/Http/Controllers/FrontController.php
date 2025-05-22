<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Kategori;
use App\Models\Sehat;
use App\Models\Diet;
use App\Models\Konsultasi;

class FrontController extends Controller
{
    public function index(Request $request)
{
    $kategori = Kategori::all(); // Untuk ditampilkan di halaman
    $berita = Berita::when($request->id_kategori, function ($query) use ($request) {
        return $query->where('id_kategori', $request->id_kategori);
    })
    ->orderBy('created_at', 'desc') // <-- Tambah ini
    ->get();


    return view('welcome', compact('berita', 'kategori'));
}


    public function sehat()
    {
       $sehat = Sehat::all();
       return view('berita_sehat', compact('sehat'));
    }

    public function diet()
    {
       $diet = Diet::all();
       return view('wellness', compact('diet'));
    }

    public function konsultasi()
    {
       $konsultasi = Konsultasi::all();
       return view('konsultasi', compact('konsultasi'));
    }
}


