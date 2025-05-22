<?php

namespace App\Http\Controllers;

use App\Models\Konsultasi;
use Illuminate\Http\Request;

class KonsultasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // menampilkan data berdasarkan tanggal yang paling akhir 
        // melalui model konsultasi
        $konsultasi = Konsultasi::latest()->get();
        return view('konsultasi.index',compact('konsultasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('konsultasi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|unique:beritas', 
            'deskripsi'  => 'required|string|max:10000',
            'gambar'  => 'required|mimes:jpg,png,jpeg,webp,avif|max:9999'
        ]);
        $konsultasi  = new Konsultasi;
        $konsultasi->judul = $request->judul;
        $konsultasi->deskripsi = $request->deskripsi;
        $konsultasi->penulis = $request->penulis;
       

        if ($request->hasFile('gambar')) {
            $konsultasi->deleteImage(); // pastikan method ini ada di model
            $img  = $request->file('gambar');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->storeAs('public/konsultasi', $name); // simpan di storage/app/public/konsultasi
            $konsultasi->gambar = $name;
        }
        $konsultasi->save();
        return redirect()->route('konsultasi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $konsultasi = Konsultasi::findOrFail($id);
        return view('konsultasi.show', compact('konsultasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $konsultasi = Konsultasi::findOrFail($id);
        return view('konsultasi.edit', compact('konsultasi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $validated = $request->validate([
            'judul' => 'required', 
            'deskripsi'  => 'required|string|max:10000',
            'gambar'  => 'required|mimes:jpg,png,jpeg,webp,avif|max:9999'
        ]);
        $konsultasi  = Konsultasi::findOrfail($id);
        $konsultasi->judul = $request->judul;
        $konsultasi->deskripsi = $request->deskripsi;
        $konsultasi->penulis = $request->penulis;
       

        if ($request->hasFile('gambar')) {
            $konsultasi->deleteimage();
            $img  = $request->file('gambar');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('storage/konsultasi', $name);
            $konsultasi->gambar = $name;
        }
        
        $konsultasi->save();
        return redirect()->route('konsultasi.index');
    }
    public function detail($id)
{
    $data = Konsultasi::findOrFail($id);
    return view('konsultasi.detail', compact('data'));
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $konsultasi = Konsultasi::findOrFail($id);
        $konsultasi->delete();
        return redirect()->route('konsultasi.index');
    }
}