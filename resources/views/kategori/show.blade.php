@extends('layouts.admin')

@section('content')

    <div class="container mt-5">
        <h2 class="text-center mb-4 fs-3">Detail Jenis Berita</h2>

        <div class="d-flex justify-content-center">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="mb-3">
                            <label for="nama_kategori" class="form-label">Nama Kategori</label>
                            <input type="text" class="form-control" id="nama_kategori" value="{{ $kategori->nama_kategori }}" disabled>
                        </div>
                        <div class="text-end">
                            <a href="{{ route('kategori.index') }}" class="btn btn-primary">Kembali</a>
                        </div>
                    </div> <!-- /.panel-body -->
                </div> <!-- /.panel -->
            </div> <!-- /.col-lg-6 -->
        </div> <!-- /.d-flex -->
    </div> <!-- /.container -->

@endsection