@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4 fs-3">Detail Berita</h2>

        <div class="d-flex justify-content-center">
            <div class="col-lg-11">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th class="w-25">Judul Berita</th>
                                    <td>{{ $berita->judul }}</td>
                                </tr>
                                <tr>
                                    <th>Deskripsi</th>
                                    <td>{{ $berita->deskripsi }}</td>
                                </tr>
                                <tr>
                                    <th>Penulis</th>
                                    <td>{{ $berita->penulis }}</td>
                                </tr>
                                <tr>
                                    <th>Gambar</th>
                                    <td>
                                        @if ($berita->gambar)
                                            <img src="{{ Storage::url('berita/' . $berita->gambar) }}" alt="Gambar Berita" 
                                                 class="img-thumbnail" style="width: 150px; height: auto;">
                                        @else
                                            <p class="text-muted">Tidak ada gambar</p>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Jenis Berita</th>
                                    <td>{{ $berita->kategori->nama_kategori }}</td>
                                </tr>
                            </table>
                            <div class="text-end">
                                <a href="{{ route('berita.index') }}" class="btn btn-primary">Kembali</a>
                            </div>
                        </div> <!-- /.card-body -->
                    </div> <!-- /.panel-body -->
                </div> <!-- /.panel -->
            </div> <!-- /.col-lg-11 -->
        </div> <!-- /.d-flex -->
    </div> <!-- /.container -->
@endsection