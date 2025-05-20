<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Sehat;

class FrontController extends Controller
{
    public function index()
    {
        $berita = Berita::all();
        return view('welcome', compact('berita'));
    }

    public function sehat()
    {
       $sehat = Sehat::all();
       return view('berita_sehat', compact('sehat'));
    }
}


