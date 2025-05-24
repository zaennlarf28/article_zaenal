<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pertanyaan;

class PertanyaanController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'pertanyaan' => 'required|string',
        ]);

        Pertanyaan::create([
            'pertanyaan' => $request->pertanyaan,
            'user_name' => auth()->check() ? auth()->user()->name : 'Anonim',
        ]);

        return back()->with('success', 'Pertanyaan berhasil dikirim.');
    }

    public function index()
    {
        $pertanyaans = Pertanyaan::latest()->get();
        return view('pertanyaan.index', compact('pertanyaans'));
    }
    

    public function jawab(Request $request, $id)
    {
        $request->validate([
            'jawaban' => 'required|string',
        ]);

        $pertanyaan = Pertanyaan::findOrFail($id);
        $pertanyaan->jawaban = $request->jawaban;
        $pertanyaan->save();

        return back()->with('success', 'Jawaban berhasil disimpan.');
    }

    public function showSinglePost() {
    $pertanyaans = Pertanyaan::latest()->get(); // ambil semua pertanyaan
    return view('namaview.single-post', compact('pertanyaans'));
}
public function updateJawaban(Request $request, $id)
{
    $request->validate([
        'jawaban' => 'required|string',
    ]);

    $pertanyaan = Pertanyaan::findOrFail($id);
    $pertanyaan->jawaban = $request->jawaban;
    $pertanyaan->save();

    return back()->with('success', 'Jawaban berhasil diperbarui.');
}

public function destroy($id)
{
    $pertanyaan = Pertanyaan::findOrFail($id);
    $pertanyaan->delete();

    return back()->with('success', 'Pertanyaan berhasil dihapus.');
}

}
