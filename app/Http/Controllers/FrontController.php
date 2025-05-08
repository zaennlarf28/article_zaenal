<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;

class FrontController extends Controller
{
    public function index()
    {
        $berita = Berita::all();
        return view('welcome', compact('berita'));
    }
}
