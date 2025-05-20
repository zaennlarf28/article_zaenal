<?php

namespace App\Http\Controllers;

use App\Models\Sehat;
use Illuminate\Http\Request;

class SehatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // menampilkan data berdasarkan tanggal yang paling akhir 
        // melalui model sehat
        $sehat = Sehat::latest()->get();
        return view('sehat.index',compact('sehat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sehat.create');
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
        $sehat  = new Sehat;
        $sehat->judul = $request->judul;
        $sehat->deskripsi = $request->deskripsi;
        $sehat->penulis = $request->penulis;
       

        if ($request->hasFile('gambar')) {
            $sehat->deleteImage(); // pastikan method ini ada di model
            $img  = $request->file('gambar');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->storeAs('public/sehat', $name); // simpan di storage/app/public/sehat
            $sehat->gambar = $name;
        }
        $sehat->save();
        return redirect()->route('sehat.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sehat = Sehat::findOrFail($id);
        return view('sehat.show', compact('sehat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sehat = Sehat::findOrFail($id);
        return view('sehat.edit', compact('sehat'));
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
        $sehat  = Sehat::findOrfail($id);
        $sehat->judul = $request->judul;
        $sehat->deskripsi = $request->deskripsi;
        $sehat->penulis = $request->penulis;
       

        if ($request->hasFile('gambar')) {
            $sehat->deleteimage();
            $img  = $request->file('gambar');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('storage/sehat', $name);
            $sehat->gambar = $name;
        }
        
        $sehat->save();
        return redirect()->route('sehat.index');
    }
    public function detail($id)
{
    $data = Sehat::findOrFail($id);
    return view('sehat.detail', compact('data'));
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sehat = Sehat::findOrFail($id);
        $sehat->delete();
        return redirect()->route('sehat.index');
    }
}