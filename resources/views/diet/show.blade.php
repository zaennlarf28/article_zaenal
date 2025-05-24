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
                                    <td>{{ $diet->judul }}</td>
                                </tr>
                                <tr>
                                    <th>Deskripsi</th>
                                    <td>{{ $diet->deskripsi }}</td>
                                </tr>
                                <tr>
                                    <th>Penulis</th>
                                    <td>{{ $diet->penulis }}</td>
                                </tr>
                                <tr>
                                    <th>Gambar</th>
                                    <td>
                                        @if ($diet->gambar)
                                            <img src="{{ Storage::url('diet/' . $diet->gambar) }}" alt="Gambar Berita" 
                                                 class="img-thumbnail" style="width: 150px; height: auto;">
                                        @else
                                            <p class="text-muted">Tidak ada gambar</p>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                            <div class="text-end">
                                <a href="{{ route('diet.index') }}" class="btn btn-primary">Kembali</a>
                            </div>
                        </div> <!-- /.card-body -->
                    </div> <!-- /.panel-body -->
                </div> <!-- /.panel -->
            </div> <!-- /.col-lg-11 -->
        </div> <!-- /.d-flex -->
    </div> <!-- /.container -->

@endsection