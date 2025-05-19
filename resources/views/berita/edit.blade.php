<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="{{ asset ('admin/css/styles.css') }}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            @include('layouts.dashboard.nav')
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
               @include('layouts.dashboard.sidebar')
            </div>
            <div id="layoutSidenav_content">
            <main>
    <div class="container mt-5">
        <h2 class="text-center mb-4 fs-3">Edit Berita</h2>

        <div class="d-flex justify-content-center">
            <div class="col-lg-11">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form action="{{ route('berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label class="form-label">Judul</label>
                                <input type="text" class="form-control" name="judul" value="{{ $berita->judul }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Deskripsi</label>
                                <textarea type="text" class="form-control" name="deskripsi" value="{{ $berita->deskripsi }}"></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Penulis</label>
                                <input type="text" class="form-control" name="penulis" value="{{ $berita->penulis }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Ganti Gambar</label><br>
                                <img src="{{ asset('storage/berita/' . $berita->gambar) }}" alt="" style="width: 120px; height: 120px; object-fit: cover;" class="mb-2">
                                <input type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar">
                                @error('gambar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Jenis Berita</label>
                                <select name="id_kategori" class="form-control">
                                    @foreach($kategori as $data)
                                        <option value="{{ $data->id }}" {{ $data->id == $berita->id_kategori ? 'selected' : '' }}>
                                            {{ $data->nama_kategori }}
                                        </option>
                                    @endforeach
                                </select>
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
</main>

                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset ('admin/js/scripts.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js') }}" crossorigin="anonymous"></script>
        <script src="{{ asset ('admin/assets/demo/chart-area-demo.js') }}"></script>
        <script src="{{ asset ('admin/assets/demo/chart-bar-demo.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset ('admin/js/datatables-simple-demo.js') }}"></script>
    </body>
</html>
