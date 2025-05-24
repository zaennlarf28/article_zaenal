@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="col-lg-10">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped text-center fs-5">
                        <thead class="table-light">
                            <tr>
                                <th colspan="3" class="text-start">
                                    <a href="{{ route('kategori.create') }}" class="btn btn-primary btn-sm">+ Tambah</a>
                                </th>
                            </tr>
                            <tr>
                                <th style="width: 5%;">No</th>
                                <th>Jenis Berita</th>
                                <th style="width: 30%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach ($kategori as $data)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $data->nama_kategori }}</td>
                                    <td>
                                        <form action="{{ route('kategori.destroy', $data->id) }}" method="POST" style="display:inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('kategori.edit', $data->id) }}" class="btn btn-success btn-sm">Edit</a>
                                            <a href="{{ route('kategori.show', $data->id) }}" class="btn btn-warning btn-sm">Show</a>
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
    </div> <!-- /.col-lg-10 -->
</div> <!-- /.d-flex -->
@endsection
