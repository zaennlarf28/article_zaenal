<?php

namespace App\Http\Controllers;

use App\Models\Diet;
use Illuminate\Http\Request;

class DietController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // menampilkan data berdasarkan tanggal yang paling akhir 
        // melalui model diet
        $diet = Diet::latest()->get();
        return view('diet.index',compact('diet'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('diet.create');
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
        $diet  = new Diet;
        $diet->judul = $request->judul;
        $diet->deskripsi = $request->deskripsi;
        $diet->penulis = $request->penulis;
       

        if ($request->hasFile('gambar')) {
            $diet->deleteImage(); // pastikan method ini ada di model
            $img  = $request->file('gambar');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->storeAs('public/diet', $name); // simpan di storage/app/public/diet
            $diet->gambar = $name;
        }
        $diet->save();
        return redirect()->route('diet.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $diet = Diet::findOrFail($id);
        return view('diet.show', compact('diet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $diet = Diet::findOrFail($id);
        return view('diet.edit', compact('diet'));
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
        $diet  = Diet::findOrfail($id);
        $diet->judul = $request->judul;
        $diet->deskripsi = $request->deskripsi;
        $diet->penulis = $request->penulis;
       

        if ($request->hasFile('gambar')) {
            $diet->deleteimage();
            $img  = $request->file('gambar');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('storage/diet', $name);
            $diet->gambar = $name;
        }
        
        $diet->save();
        return redirect()->route('diet.index');
    }
    public function detail($id)
{
    $data = Diet::findOrFail($id);
    return view('diet.detail', compact('data'));
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $diet = Diet::findOrFail($id);
        $diet->delete();
        return redirect()->route('diet.index');
    }
}