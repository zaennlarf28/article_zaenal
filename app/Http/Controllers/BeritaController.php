<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $berita = Berita::all();
        return view('berita.index', compact('berita'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('berita.create', compact('kategori'));
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
            'deskripsi'  => 'required',
            'gambar'  => 'required|mimes:jpg,png,jpeg,webp,avif|max:9999'
        ]);
        $berita  = new Berita;
        $berita->judul = $request->judul;
        $berita->deskripsi = $request->deskripsi;
        $berita->penulis = $request->penulis;

        if ($request->hasFile('gambar')) {
            $berita->deleteImage(); // pastikan method ini ada di model
            $img  = $request->file('gambar');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->storeAs('public/berita', $name); // simpan di storage/app/public/berita
            $berita->gambar = $name;
        }
        $berita->id_kategori = $request->id_kategori;
        $berita->save();

        session()->flash('success','Data Berhasil ditambahkan');
        return redirect()->route('berita.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $berita = Berita::findOrfail($id);
        return view('berita.show', compact('berita'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        $kategori = kategori::all();
        return view('berita.edit', compact('berita','kategori'));
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
            'deskripsi'  => 'required',
            'gambar'  => 'required|mimes:jpg,png,jpeg,webp,avif|max:9999'
        ]);
        $berita  = Berita::findOrfail($id);
        $berita->judul = $request->judul;
        $berita->deskripsi = $request->deskripsi;
        $berita->penulis = $request->penulis;

        if ($request->hasFile('gambar')) {
            $berita->deleteimage();
            $img  = $request->file('gambar');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('storage/berita', $name);
            $berita->gambar = $name;
        }

        $berita->id_kategori = $request->id_kategori;
        $berita->save();

        session()->flash('success','Data Berhasil ditambahkan');
        return redirect()->route('berita.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        
        $berita->delete();
        return Redirect()->route('berita.index')->with('success','Data Berhasil Dihapus');
    }
}