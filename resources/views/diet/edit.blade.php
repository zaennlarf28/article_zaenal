@extends('layouts.admin')

@section('content')

    <div class="container mt-5">
        <h2 class="text-center mb-4 fs-3">Edit Berita</h2>

        <div class="d-flex justify-content-center">
            <div class="col-lg-11">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form action="{{ route('diet.update', $diet->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label class="form-label">Judul</label>
                                <input type="text" class="form-control" name="judul" value="{{ $diet->judul }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Deskripsi</label>
                                <textarea type="text" class="form-control" name="deskripsi" value="{{ $diet->deskripsi }}"></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Penulis</label>
                                <input type="text" class="form-control" name="penulis" value="{{ $diet->penulis }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Ganti Gambar</label><br>
                                <img src="{{ asset('storage/diet/' . $diet->gambar) }}" alt="" style="width: 120px; height: 120px; object-fit: cover;" class="mb-2">
                                <input type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar">
                                @error('gambar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                           
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