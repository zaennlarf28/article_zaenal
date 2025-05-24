@extends('layouts.admin')

@section('content')

    <div class="container mt-5">
        <h1 class="text-center mb-4 fs-3">Admin Artikel</h1>

        <div class="d-flex justify-content-center">
            <div class="col-lg-11"> <!-- Lebih lebar -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped text-center fs-5">
                                <thead class="table-light">
                                    <tr>
                                        <th colspan="7" class="text-start">
                                            <a href="{{ route('berita.create') }}" class="btn btn-primary btn-sm">Tambah</a>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th style="width: 5%;">No</th>
                                        <th>Judul</th>
                                        <th>Deskripsi</th>
                                        <th>Penulis</th>
                                        <th>Gambar</th>
                                        <th>Jenis Berita</th>
                                        <th style="width: 25%;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($berita as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ Str::limit($data->judul, 50, '...') }}</td>
                                            <td>{{ Str::limit($data->deskripsi, 80, '...') }}</td>
                                            <td>{{ $data->penulis }}</td>
                                            <td>
                                                @if ($data->gambar)
                                                    <img src="{{ asset('storage/berita/' . $data->gambar) }}" alt="Gambar" style="max-width: 100px;">
                                                @else
                                                    <span>Tidak ada gambar</span>
                                                @endif
                                            </td>
                                            <td>{{ $data->kategori->nama_kategori }}</td>
                                            <td>
                                                <form action="{{ route('berita.destroy',$data->id) }}" method="POST" style="display:inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('berita.edit', $data->id) }}" class="btn btn-success btn-sm">Edit</a>
                                                    <a href="{{ route('berita.show', $data->id) }}" class="btn btn-warning btn-sm">Show</a>
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> <!-- /.table-responsive -->
                    </div> <!-- /.panel-body -->
                </div> <!-- /.panel -->
            </div> <!-- /.col-lg-11 -->
        </div> <!-- /.d-flex -->
    </div> <!-- /.container -->

@endsection