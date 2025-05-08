<?php
namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return view('kategori.index', compact('kategori'));
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|unique:kategoris', 
        ]);
        // validasi
        // $validated = $request->validate([
        //     'nama_buku'      => 'required|unique:bukus',
        //     'genre_buku'          => 'required',
        //     'harga'          => 'required|numeric',
        //     'stok'           => 'required|numeric',
        //  

        $kategori       = new Kategori();
        $kategori->nama_kategori = $request->nama_kategori;

        $kategori->save();
        session()->flash('success', 'data berhasil disimpan');
        return redirect()->route('kategori.index');
    }

    public function show($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('kategori.show', compact('kategori'));
    }

    public function edit($id)
    {
        $kategori = kategori::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|unique:kategoris', 
        ]);
        // $validated = $request->validate([
        //     'nama_buku'      => 'required',
        //     'genre'          => 'required',
        //     'harga'          => 'required|numeric',
        //     'stok'           => 'required|numeric',
        //     'penerbit'       => 'required',
        //     'tanggal_terbit' => 'required',
        //     'foto'           => 'nullable|mimes:jpg,png|max:1024',
        // ]);

        $kategori       = Kategori::findOrFail($id);
        $kategori->nama_kategori = $request->nama_kategori;

        $kategori->save();
        session()->flash('success', 'data berhasil disimpan');
        return redirect()->route('kategori.index');

    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
        return redirect()->route('kategori.index');

    }
}