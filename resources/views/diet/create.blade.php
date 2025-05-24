@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4 fs-3">Tambah Berita</h1>

        <div class="d-flex justify-content-center">
            <div class="col-lg-11">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form action="{{ route('diet.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Judul</label>
                                <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" >
                                @error('judul')
                                 <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Deskripsi</label>
                                <textarea type="text" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi"></textarea>
                                @error('deskripsi')
                                 <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Penulis</label>
                                <input type="text" class="form-control" name="penulis">
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="gambar">Gambar</label>
                                <input type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar">
                                @error('gambar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="text-end">
                                <a href="{{ route('diet.index') }}" class="btn btn-primary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div> <!-- /.panel-body -->
                </div> <!-- /.panel -->
            </div> <!-- /.col-lg-11 -->
        </div> <!-- /.d-flex -->
    </div> <!-- /.container -->

@endsection