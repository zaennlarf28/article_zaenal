@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4 fs-3">Tambah Berita</h1>
        <div class="d-flex justify-content-center">
            <div class="col-lg-11">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form action="{{ route('kategori.update', $kategori->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label class="form-label">Jenis Berita</label>
                                <input type="text" class="form-control" name="nama_kategori" value="{{ $kategori->nama_kategori }}" required>
                            </div>

                            <div class="text-end">
                                <a href="{{ route('berita.index') }}" class="btn btn-primary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div> <!-- /.panel-body -->
                </div> <!-- /.panel -->
            </div> <!-- /.col-lg-11 -->
        </div> <!-- /.d-flex -->
    </div> <!-- /.container -->

@endsection